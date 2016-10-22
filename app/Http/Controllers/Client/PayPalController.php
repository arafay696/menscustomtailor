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
use PayPal\Api\Cost;
use PayPal\Api\Invoice;
use Session;
use Redirect;
use URL;
use Auth;
use Config;
use Log;
use Input;
use DB;
use Mail;

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

    public function postGiftPayment(Request $request)
    {
        Request::flash();

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Gift Card Amount')// item name
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request::get('giftAmount')); // unit price

        $itemsArr = array();
        array_push($itemsArr, $item_1);

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems($itemsArr);

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request::get('giftAmount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Gift Card Description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('gift.status'))
            ->setCancelUrl(URL::route('gift.status'));

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

    public function getGiftPaymentStatus(Request $request)
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

            if ($result->getState() == 'approved') { // payment made

                $data = array();
                $data['rec_name'] = $request::old('recName');
                $data['rec_email'] = $request::old('recEmail');
                $data['purchaser_name'] = $request::old('purName');
                $data['purchaser_email'] = $request::old('purEmail');
                $data['coupon_code'] = str_random(8);
                $data['message'] = $request::old('purMsg');
                $data['datetime'] = date('Y-m-d H:i:s');
                $data['amount'] = $request::old('giftAmount');
                $data['status'] = 1;

                DB::table('giftcards')->insert($data);

                // Send Email to Purchaser
                $purchaserData = array(
                    'Subject' => 'Gift Card Send',
                    'name' => "Men's Custom Tailor",
                    'code' => $data['coupon_code'],
                    'email' => $data['purchaser_email'],
                    'price' => $data['amount']
                );

                Mail::send('client.giftcardEmail', $purchaserData, function ($message) use ($purchaserData) {
                    $message->subject($purchaserData['Subject'])
                        ->to($purchaserData['email']);
                });

                // Send Email to Recipient
                $recData = array(
                    'Subject' => 'Gift Card Received',
                    'name' => "Men's Custom Tailor",
                    'code' => $data['coupon_code'],
                    'from' => $data['purchaser_email'],
                    'msg' => $data['message'],
                    'rec_name' =>$data['rec_name'],
                    'email' =>$data['rec_email'],
                    'price' => $data['amount']
                );

                Mail::send('client.giftcardEmailReceived', $recData, function ($message) use ($recData) {
                    $message->subject($recData['Subject'])
                        ->to($recData['email']);
                });

                Session::forget('ProcessOrderId');
                Session::flash('globalSuccessMsg', 'Gift Card Successfully Paid. Check your email. :)');
                Session::flash('alert-class', 'alert-success');
                return Redirect::to('/');

            }
            return Redirect::route('original.route')
                ->with('error', 'Payment failed');
        } else {
            return Redirect::to('gift-card');
        }
    }

    public function finish(Request $request){
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
            $updatedata['Status'] = 1;
            $updatedata['Paid'] = Session::get('TotalAmountIS');
        }


        DB::table('orders')
            ->where('ID', $orderID)
            ->update($updatedata);

        // Update User Info
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('customers')->where('ID', Session::get('CustomerID'))
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        $updateUserdata = array();
        foreach ($getUser as $data) {
            $updateUserdata = $data;
            $updateUserdata['Phone'] = $request::get('Phone');
            $updateUserdata['City'] = $request::get('City');
            $updateUserdata['Country'] = $request::get('Country');
            $updateUserdata['Address'] = $request::get('Address');
            $updateUserdata['State'] = $request::get('State');
            $updateUserdata['ZipCode'] = $request::get('ZipCode');
        }


        DB::table('customers')
            ->where('ID', Session::get('CustomerID'))
            ->update($updateUserdata);
        // Update User Info End

        $DiscountType = Session::get('DiscountType');
        $coupon = Session::get('CouponCode');
        //echo $DiscountType . $coupon; exit;
        if($DiscountType == 'Gift'){
            $giftcards = DB::table('giftcards')
                ->select('*')
                ->where('coupon_code', '=', $coupon)
                ->where('status', '=', 1)
                ->first();

            $usedAmount = 0;
            $updateGdata = array();
            if($this->getTotal() <= $giftcards->amount){
                $usedAmount = $giftcards->amount - $this->getTotal();
                $updateGdata['status'] = 1;
            }else{
                $usedAmount = 0;
                $updateGdata['status'] = 2;
            }
            $updateGdata['amount'] = $usedAmount;
            DB::table('giftcards')
                ->where('coupon_code', $coupon)
                ->update($updateGdata);
        }

        $this->emptyCart();
        Session::flash('globalSuccessMsg', 'Order Successfull :) Thank you for your order.');
        Session::flash('alert-class', 'alert-success');
        return Redirect::to('/');

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
        }


        DB::table('orders')
            ->where('ID', $orderID)
            ->update($updatedata);

        // Update User Info
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('customers')->where('ID', Session::get('CustomerID'))
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        $updateUserdata = array();
        foreach ($getUser as $data) {
            $updateUserdata = $data;
            $updateUserdata['Phone'] = $request::get('Phone');
            $updateUserdata['City'] = $request::get('City');
            $updateUserdata['Country'] = $request::get('Country');
            $updateUserdata['Address'] = $request::get('Address');
            $updateUserdata['State'] = $request::get('State');
            $updateUserdata['ZipCode'] = $request::get('ZipCode');
        }


        DB::table('customers')
            ->where('ID', Session::get('CustomerID'))
            ->update($updateUserdata);
        // Update User Info End

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

        $total -= (float)$request::get('setDiscountAmount');

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

        if(!empty($request::get('offerType')) || $request::get('offerType') !== ""){
            //dd($request::get('setDiscountAmount'));
            $ds = new Item();
            $ds->setName('Discount')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice('-'.$request::get('setDiscountAmount').''); // unit price
            array_push($itemsArr, $ds);
        }

        //dd($itemsArr);
        $shipCharges = $request::get('ShippingHidden');

        /*$item_2 = new Item();
        $item_2->setName('Discount')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice('-5'); // unit price
        array_push($itemsArr, $item_2);*/

        // add item to list
        $item_list = new ItemList();
        $item_list->setItems($itemsArr);


        $details = new Details();
        $details->setSubtotal($total)
            ->setShipping($shipCharges);

        $total = $total + $shipCharges;

        //dd($this->getTotal()+$shipCharges-2);
        //dd($total);
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($total)
            ->setDetails($details);

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

                // Change Status to Paid if Payment Complete
                $updatedata = array();
                $updatedata['Status'] = 1;
                $updatedata['Paid'] = Session::get('TotalAmountIS');
                DB::table('orders')
                    ->where('ID', Session::get('ProcessOrderId'))
                    ->update($updatedata);

                $DiscountType = Session::get('DiscountType');
                $coupon = Session::get('CouponCode');
                //echo $DiscountType . $coupon; exit;
                if($DiscountType == 'Gift'){
                    $giftcards = DB::table('giftcards')
                        ->select('*')
                        ->where('coupon_code', '=', $coupon)
                        ->where('status', '=', 1)
                        ->first();

                    $usedAmount = 0;
                    $updateGdata = array();
                    if($this->getTotal() <= $giftcards->amount){
                        $usedAmount = $giftcards->amount - $this->getTotal();
                        $updateGdata['status'] = 1;
                    }else{
                        $usedAmount = 0;
                        $updateGdata['status'] = 2;
                    }
                    $updateGdata['amount'] = $usedAmount;
                    DB::table('giftcards')
                        ->where('coupon_code', $coupon)
                        ->update($updateGdata);
                }

                $this->emptyCart();
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
