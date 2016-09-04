<?php
namespace App\Http\Controllers\Client;

use Request;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use Session;
use Redirect;
use URL;
use Auth;
use Config;
use Log;
use Input;
use DB;

class PayPalController extends BaseController
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function postPayment(Request $request)
    {
        $orderID = Session::get('ProcessOrderId');
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getOrder = DB::table('orders')->where('ID', $orderID)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        $updatedata = array();
        foreach ($getOrder as $data) {
            $updatedata = $data;
            $updatedata['CustomerName'] = $request::get('FirstName') . ' ' . $request::get('LastName');
            $updatedata['ShippingAddress'] = $request::get('Address');
            $updatedata['Comments'] = $request::get('Comments');
            $updatedata['ShipMethod'] = $request::get('ShipMethod');
        }


        DB::table('orders')
            ->where('ID', $orderID)
            ->update($updatedata);


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $data = $this->getCartData();
        $itemsArr = array();
        $total = 0;
        foreach ($data as $key => $rs) {
            if ($rs['Price'] > 0) {
                $total += ($rs['Price'] * $rs['Qty']);
                ${'file_' . $key} = new Item();

                ${'file_' . $key}->setName("" . $rs['ProductName'] . "")// item name
                ->setCurrency('USD')
                    ->setQuantity($rs['Qty'])
                    ->setPrice("" . $rs['Price'] . ""); // unit price
                array_push($itemsArr, ${'file_' . $key});
            }
        }

        Session::put('TotalAmountIS', $total);
        /*$item_1 = new Item();
        $item_1->setName('Item 1')// item name
        ->setCurrency('USD')
            ->setQuantity(2)
            ->setPrice('15'); // unit price

        $item_2 = new Item();
        $item_2->setName('Item 2')
            ->setCurrency('USD')
            ->setQuantity(4)
            ->setPrice('7');

        $item_3 = new Item();
        $item_3->setName('Item 3')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice('20');*/

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems($itemsArr);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status'))
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));

        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Some error occur, sorry for inconvenient');
            }
        }

        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }

        // add payment ID to session
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {
            // redirect to paypal
            return Redirect::away($redirect_url);
        }

        return Redirect::route('original.route')
            ->with('error', 'Unknown error occurred');
    }

    public function getPaymentStatus()
    {
        if (Request::has('PayerID')) {
            // Get the payment ID before session clear
            $payment_id = Session::get('paypal_payment_id');

            // clear the session payment ID
            Session::forget('paypal_payment_id');

            if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
                return Redirect::route('original.route')
                    ->with('error', 'Payment failed');
            }

            $payment = Payment::get($payment_id, $this->_api_context);

            // PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new PaymentExecution();
            $execution->setPayerId(Input::get('PayerID'));

            //Execute the payment
            $result = $payment->execute($execution, $this->_api_context);

            /*echo '<pre>';
            print_r($result);
            echo '</pre>';
            exit; // DEBUG RESULT, remove it later*/

            if ($result->getState() == 'approved') { // payment made
                $this->emptyCart();

                // Change Status to Paid if Payment Complete
                $updatedata = array();
                $updatedata['Status'] = 1;
                $updatedata['Paid'] = Session::get('TotalAmountIS');
                DB::table('orders')
                    ->where('ID', Session::get('ProcessOrderId'))
                    ->update($updatedata);

                Session::forget('ProcessOrderId');
                Session::flash('globalSuccessMsg', 'Order Successfull :) Thank you for your order.');
                Session::flash('alert-class', 'alert-success');
                return Redirect::to('/');
                return Redirect::route('original.route')
                    ->with('success', 'Payment success');
            }
            return Redirect::route('original.route')
                ->with('error', 'Payment failed');
        }

    }

}
