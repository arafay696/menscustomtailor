<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 8/6/2016
 * Time: 3:10 PM
 */

namespace App\Http\Controllers\Client;

use Request;
use Session;
use Redirect;
use DB;

class CartController extends BaseController
{
    public function index()
    {
        $cartData = $this->getCartData();
        //dd($cartData);
        $data = array(
            'cart' => $cartData,
            'USPSPriority' => [9.50, 13.50, 16.50, 23.50, 29.50, 32.50, 35.50, 37.50, 39.50, 40.50, 55.50],
            'USPSNextDay' => [25, 35, 40, 65, 65, 65, 95],
            'International' => [25, 38, 45, 45, 45, 75, 75, 75, 150]
        );
        return view('client/cart', $data);
    }

    public function verifyDiscountCoupon(Request $request)
    {
        $discountCoupon = $request::get('discountCoupon');

        $discounts = DB::table('discountcode')
            ->select('*')
            ->where('DiscountCode', '=', $discountCoupon)
            ->where('Status', '=', 1)
            ->where('StartDate', '<=', date('Y-m-d H:i:s'))
            ->where('EndDate', '>=', date('Y-m-d H:i:s'))
            ->first();

        if (count($discounts) > 0) {
            echo json_encode(array(
                'status' => true,
                'discount' => $discounts->DiscountPercent
            ));
        } else {
            echo json_encode(array(
                'status' => false
            ));
        }
    }

    public function verifyGiftCoupon(Request $request)
    {
        $discountCoupon = $request::get('giftCoupon');

        $discounts = DB::table('giftcards')
            ->select('*')
            ->where('coupon_code', '=', $discountCoupon)
            ->where('status', '=', 1)
            ->first();

        if (count($discounts) > 0) {
            echo json_encode(array(
                'status' => true,
                'discount' => $discounts->amount
            ));
        } else {
            echo json_encode(array(
                'status' => false
            ));
        }
    }

    public function UpdateData(Request $request)
    {
        $getQty = $request::input('Qty');
        $getQty = explode(",", $getQty);
        $CartData = $this->getCartData();
        foreach ($CartData as $key => $val) {
            $quotaIS = (int)$getQty[$key];
            $CartData[$key]['Qty'] = $quotaIS;
        }
        $this->setCartData('CartData', $CartData);
        return json_encode(array('status' => true, 'data' => $CartData));
    }

    public function RemoveItem($key)
    {
        $data = $this->getCartData();
        unset($data[$key]);
        Session::put('CartData', $data);
        if(count($this->getCartData()) <= 0){
            Session::forget('chooseFabs');
            Session::forget('chooseQty');
        }
        return Redirect::back();
    }

    public function checkOption($array, $findValue)
    {
        $find = false;
        foreach ($array as $value) {
            if (isset($value[$findValue])) {
                if ($value[$findValue] && !$find) {
                    $find = true;
                }
            }

        }

        return $find;
    }

    public function SaveData(Request $request)
    {
        try {
            DB::beginTransaction();
            // Get Session Data
            $data = $this->getCartData();
            $userId = Session::get('CustomerID');
            $CustomerEmail = Session::get('CustomerEmail');
            $CustomerName = Session::get('CustomerName');

            // Check Already Size exist - Insert Or update
            $getSize = DB::table('size')
                ->select('ID', 'CustomerID')
                ->where("CustomerID", "=", $userId)
                ->first();

            // Save Size
            if (count($data) > 0) {
                $sizeDetail = array();
                $sizeDetail['CustomerID'] = $userId;
                foreach ($data as $value) {
                    $sizeDetail['SizeOption'] = (isset($value['SizeOption'])) ? $value['SizeOption'] : '';
                    $sizeDetail['HeightInches'] = (isset($value['HeightInches'])) ? $value['HeightInches'] : '';
                    $sizeDetail['HeightFeet'] = (isset($value['HeightFeet'])) ? $value['HeightFeet'] : '';
                    $sizeDetail['Weight'] = (isset($value['Weight'])) ? $value['Weight'] : '';
                    $sizeDetail['NeckHeight'] = (isset($value['NeckHeight'])) ? $value['NeckHeight'] : '';
                    $sizeDetail['NeckSize'] = (isset($value['NeckSize'])) ? $value['NeckSize'] : '';
                    $sizeDetail['LeftSleeve'] = (isset($value['sleeveLength'])) ? $value['sleeveLength'] : '';
                    $sizeDetail['RightSleeve'] = (isset($value['sleeveLength'])) ? $value['sleeveLength'] : '';
                    $sizeDetail['Chest'] = (isset($value['Chest'])) ? $value['Chest'] : '';
                    $sizeDetail['Waist'] = (isset($value['Waist'])) ? $value['Waist'] : '';
                    $sizeDetail['Hips'] = (isset($value['Hips'])) ? $value['Hips'] : '';
                    $sizeDetail['Yoke'] = (isset($value['Yoke'])) ? $value['Yoke'] : '';
                    $sizeDetail['Tail'] = (isset($value['Tail'])) ? $value['Tail'] : '';
                    $sizeDetail['LeftCuff'] = (isset($value['LeftCuff'])) ? $value['LeftCuff'] : '';
                    $sizeDetail['RightCuff'] = (isset($value['RightCuff'])) ? $value['RightCuff'] : '';
                    $sizeDetail['FittingOption'] = (isset($value['FittingOption'])) ? $value['FittingOption'] : '';
                    $sizeDetail['Posture'] = (isset($value['Posture'])) ? $value['Posture'] : '';
                    $sizeDetail['ChestDescription'] = (isset($value['ChestDescription'])) ? $value['ChestDescription'] : '';
                    $sizeDetail['ArmType'] = (isset($value['ArmType'])) ? $value['ArmType'] : '';
                    $sizeDetail['BodyShape'] = (isset($value['BodyShape'])) ? $value['BodyShape'] : '';
                    $sizeDetail['BodyProportion'] = (isset($value['BodyProportion'])) ? $value['BodyProportion'] : '';
                    $sizeDetail['ShoulderLine'] = (isset($value['ShoulderLine'])) ? $value['ShoulderLine'] : '';
                    $sizeDetail['Shoulder'] = (isset($value['Shoulder'])) ? $value['Shoulder'] : '';
                    $sizeDetail['ExtraShirtTail'] = (isset($value['ExtraShirtTail'])) ? $value['ExtraShirtTail'] : '';
                    $sizeDetail['ShorterShirtTail'] = (isset($value['ShorterShirtTail'])) ? $value['ShorterShirtTail'] : '';
                    $sizeDetail['FitAroundChestShoulder'] = (isset($value['FitAroundChestShoulder'])) ? $value['FitAroundChestShoulder'] : '';
                    $sizeDetail['FitAroundWaist'] = (isset($value['FitAroundWaist'])) ? $value['FitAroundWaist'] : '';
                    $sizeDetail['CoatSize'] = (isset($value['CoatSize'])) ? $value['CoatSize'] : '';
                    $sizeDetail['PantSize'] = (isset($value['PantSize'])) ? $value['PantSize'] : '';
                    $sizeDetail['Inseam'] = (isset($value['Inseam'])) ? $value['Inseam'] : '';
                    $sizeDetail['Status'] = 'A';
                    $sizeDetail['Comments'] = (isset($value['Comments'])) ? $value['Comments'] : '';
                    $sizeDetail['Dat'] = date('Y-m-d H:i:s');
                    $sizeDetail['CoatLength'] = (isset($value['CoatLength'])) ? $value['CoatLength'] : '';
                    $sizeDetail['Confirm'] = (isset($value['Confirm'])) ? $value['Confirm'] : '';
                    $sizeDetail['SleeveFullnessInBicep'] = (isset($value['SleeveFullnessInBicep'])) ? $value['SleeveFullnessInBicep'] : '';
                    $sizeDetail['ArmHole'] = (isset($value['ArmHole'])) ? $value['ArmHole'] : '';
                    $sizeDetail['RaiseCollar'] = (isset($value['RaiseCollar'])) ? '' : '';
                    $sizeDetail['SleeveFullnessIntoCuff'] = (isset($value['SleeveFullnessIntoCuff'])) ? '' : '';
                    $sizeDetail['BackDart'] = (isset($value['BackDart'])) ? $value['BackDart'] : '';
                    $sizeDetail['ScoopFrontNeck'] = (isset($value['ScoopFrontNeck'])) ? $value['ScoopFrontNeck'] : '';
                    $sizeDetail['SalesPerson'] = (isset($value['SalesPerson'])) ? $value['SalesPerson'] : '';
                    $sizeDetail['DecideOn'] = (isset($value['DecideOn'])) ? $value['DecideOn'] : '';
                    $sizeDetail['ShirtNeckSize'] = (isset($value['NeckSize'])) ? $value['NeckSize'] : '';
                    $sizeDetail['ShirtLength'] = (isset($value['ShirtLength'])) ? $value['ShirtLength'] : '';
                    $sizeDetail['MidSection'] = (isset($value['MidSection'])) ? $value['MidSection'] : '';
                    $sizeDetail['BiggestChallenge'] = (isset($value['BiggestChallenge'])) ? $value['BiggestChallenge'] : '';
                }
            }


            if (count($getSize) <= 0 && !is_array($getSize)) {
                $sizeID = DB::table('size')->insertGetId($sizeDetail);
            } else {
                $CustomerID = $getSize->CustomerID;
                $sizeID = $getSize->ID;
                DB::table('size')->where('CustomerID', $CustomerID)->update($sizeDetail);
            }

            // Get Price,Amount & Other Charges
            $OrderDetailItems = $request::except('_token');
            $shippingCharges = $OrderDetailItems['ShippingHidden'];

            Session::put('ShipCharges', 0);
            Session::put('ShipCharges', $shippingCharges);

            // Check discount
            $getDiscountType  = $request::get('offerType');
            $discount = (!empty($getDiscountType) && $getDiscountType != "") ? $request::get('setDiscountAmount') : 0;

            Session::put('DiscountType', $getDiscountType);
            Session::put('Discount', $discount);
            Session::put('CouponCode', $request::get('setCoupon'));

            /*
             * --- Save Order
             * */
            $orderDetail = array();
            $orderDetail['CustomerID'] = $userId;
            $orderDetail['GOrderNo'] = mt_rand(1, 5000);
            $orderDetail['Code'] = mt_rand(1, 5000);
            $orderDetail['OrderType'] = '';
            $orderDetail['PlacedFor'] = 'MCT';
            $orderDetail['Price'] = $OrderDetailItems['Amount'];
            $orderDetail['OtherItem'] = '';
            $orderDetail['SalesTax'] = 0;
            $orderDetail['Discount'] = $discount;
            $orderDetail['Shiping'] = $OrderDetailItems['ShippingHidden'];
            $orderDetail['Deal'] = '';
            $orderDetail['Mono'] = 0;
            $orderDetail['WhiteCollar'] = ($this->checkOption($data, 'whiteCollar')) ? 5 : 0;
            $orderDetail['WhiteCuff'] = ($this->checkOption($data, 'whiteCuff')) ? 5 : 0;
            $orderDetail['PleatedFront'] = 0;
            $orderDetail['TuxFront'] = 0;
            $orderDetail['LessShirt'] = '';
            $orderDetail['Custom'] = '';
            $orderDetail['OverSize'] = '';
            $orderDetail['Pocket'] = 0;
            $orderDetail['Rush'] = '';
            $orderDetail['Sleeve'] = '';
            $orderDetail['Tail'] = '';
            $orderDetail['DiffCollar'] = ($this->checkOption($data, 'whiteCollar')) ? 5 : 0;
            $orderDetail['Amount'] = $OrderDetailItems['Amount'] + $OrderDetailItems['ShippingHidden'] + $discount;
            $orderDetail['Paid'] = 0;
            $orderDetail['TransferTo'] = $CustomerName;
            $orderDetail['Status'] = 2;
            $orderDetail['TrackingNo'] = mt_rand(1, 5000);
            $orderDetail['OnTime'] = '';
            $orderDetail['Must'] = '';
            $orderDetail['Comments'] = '';
            $orderDetail['Description'] = '';
            $orderDetail['StatusText'] = 'New Order';
            $orderDetail['OrderDate'] = date('Y-m-d H:i:s');
            $orderDetail['PromiseDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $orderDetail['DeliveryDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $orderDetail['TentitiveShipDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $orderDetail['ProductionDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $orderDetail['ShipDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $orderDetail['CallDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 8 days'));
            $orderDetail['ActionTaken'] = '';
            $orderDetail['SalesPerson'] = '';
            $orderDetail['SubmittedBy'] = 'MCT';
            $orderDetail['Level1Status'] = '';
            $orderDetail['ShipMethod'] = $OrderDetailItems['ShippingMethodHidden'];
            $orderDetail['CustomerName'] = $CustomerName;
            $orderDetail['ShippingAddress'] = '';
            $orderDetail['SizeID'] = $sizeID;
            $orderDetail['Site'] = 'MCT';
            $orderDetail['DirectShipment'] = '';
            $orderDetail['NotSure'] = '';
            $orderDetail['MailingID'] = $CustomerEmail;
            $orderDetail['Extra'] = '';
            $orderDetail['ExtraCharges'] = '';

            $orderID = DB::table('orders')->insertGetId($orderDetail);

            /*
             * --- Save Shirt Detail
             * */
            $total = 0;
            $shirtDetail = array();
            foreach ($data as $value) {
                $total += $value['Price'];
                $shirtDetailItem = array();
                $shirtDetailItem['OrderID'] = $orderID;
                $shirtDetailItem['SizeID'] = $sizeID;
                $shirtDetailItem['FabricCode'] = $value['ProductCode'];
                $shirtDetailItem['FabricColor'] = 'Black';
                $shirtDetailItem['FabricContents'] = 'FabricContents';
                $shirtDetailItem['Qty'] = $value['Qty'];
                $shirtDetailItem['FabricPrice'] = $value['Price'];
                $shirtDetailItem['Total'] = number_format($value['Qty'] * $value['Price'], 2);
                $shirtDetailItem['ExtraCharges'] = 0;
                $shirtDetailItem['Discount'] = 0;
                $shirtDetailItem['CollarStyle'] = (isset($value['collarType'])) ? $value['collarType'] : '';
                $shirtDetailItem['CollarLength'] = (isset($value['NeckHeight'])) ? $value['NeckHeight'] : '';
                $shirtDetailItem['CollarHeight'] = (isset($value['NeckHeight'])) ? $value['NeckHeight'] : '';
                $shirtDetailItem['WhiteCollar'] = (isset($value['whiteCollar'])) ? $value['whiteCollar'] : 0;
                $shirtDetailItem['CollarTieSpace'] = (isset($value['CollarTieSpace'])) ? $value['CollarTieSpace'] : 0;
                $shirtDetailItem['CollarStays'] = (isset($value['CollarStays'])) ? $value['CollarStays'] : 0;
                $shirtDetailItem['CollarLining'] = (isset($value['CollarLining'])) ? $value['CollarLining'] : 0;
                $shirtDetailItem['CollarStitch'] = (isset($value['CollarStitch'])) ? $value['CollarStitch'] : 0;
                $shirtDetailItem['FrontStyle'] = (isset($value['frontStyle'])) ? $value['frontStyle'] : '';
                $shirtDetailItem['FrontClosure'] = (isset($value['FrontClosure'])) ? $value['FrontClosure'] : '';
                $shirtDetailItem['BackStyle'] = (isset($value['BackStyle'])) ? $value['BackStyle'] : '';
                $shirtDetailItem['ShirtBottomStyle'] = (isset($value['ShirtBottomStyle'])) ? $value['ShirtBottomStyle'] : '';
                $shirtDetailItem['CuffStyle'] = (isset($value['cuffStyle'])) ? $value['cuffStyle'] : '';
                $shirtDetailItem['WhiteCuffs'] = (isset($value['whiteCuff'])) ? $value['whiteCuff'] : 0;
                $shirtDetailItem['CuffLining'] = (isset($value['CuffLining'])) ? $value['CuffLining'] : 0;
                $shirtDetailItem['CuffStitch'] = (isset($value['CuffStitch'])) ? $value['CuffStitch'] : 0;
                $shirtDetailItem['HalfSleeve'] = (isset($value['HalfSleeve'])) ? $value['HalfSleeve'] : 0;
                $shirtDetailItem['Monogram'] = (isset($value['monogramStyle'])) ? $value['monogramStyle'] : '';
                $shirtDetailItem['MonoPosition'] = (isset($value['monogramLocation'])) ? $value['monogramLocation'] : '';
                $shirtDetailItem['MonoColor'] = (isset($value['monogramLocation'])) ? $value['monogramColor'] : '';
                $shirtDetailItem['MonoInitials'] = (isset($value['monogramIntials'])) ? $value['monogramIntials'] : '';
                $shirtDetailItem['PocketStyle'] = (isset($value['pocketStyle'])) ? $value['pocketStyle'] : '';
                $shirtDetailItem['NumberOfPockets'] = (isset($value['noOfPocket'])) ? $value['noOfPocket'] : '';
                $shirtDetailItem['PleatedPocket'] = (isset($value['noOfPocket'])) ? $value['noOfPocket'] : '';
                $shirtDetailItem['PocketFlaps'] = (isset($value['noOfPocket'])) ? $value['noOfPocket'] : '';
                $shirtDetailItem['ShirtType'] = (isset($value['shirtType'])) ? $value['shirtType'] : '';
                $shirtDetailItem['Deal'] = (isset($value['Deal'])) ? $value['Deal'] : '';
                $shirtDetailItem['StyleComments'] = (isset($value['StyleComments'])) ? $value['StyleComments'] : '';
                $shirtDetailItem['Dat'] = date('Y-m-d H:i:s');
                $shirtDetailItem['Fit'] = (isset($value['Fit'])) ? $value['Fit'] : '';
                $shirtDetailItem['FedEx'] = (isset($value['FedEx'])) ? $value['FedEx'] : '';
                $shirtDetailItem['TransferToLevel1'] = (isset($value['TransferToLevel1'])) ? $value['TransferToLevel1'] : '';
                $shirtDetailItem['TransferDate1'] = (isset($value['TransferDate1'])) ? $value['TransferDate1'] : '';
                $shirtDetailItem['Level1PromiseDate'] = (isset($value['Level1PromiseDate'])) ? $value['Level1PromiseDate'] : '';
                $shirtDetailItem['Level1TentitiveDate'] = (isset($value['Level1TentitiveDate'])) ? $value['Level1TentitiveDate'] : '';
                $shirtDetailItem['Level1Ship'] = (isset($value['Level1Ship'])) ? $value['Level1Ship'] : '';
                $shirtDetailItem['ShipDate1'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['TransferToLevel2'] = (isset($value['TransferToLevel2'])) ? $value['TransferToLevel2'] : '';
                $shirtDetailItem['TransferDate2'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['Level2Ship'] = (isset($value['Level2Ship'])) ? $value['Level2Ship'] : '';
                $shirtDetailItem['ShipDate2'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['ShipToCustomer'] = $CustomerName;
                $shirtDetailItem['CustomerShipDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['StatusID'] = 1;
                $shirtDetailItem['ShirtStatus'] = 1;
                $shirtDetailItem['Status'] = 1;
                $shirtDetailItem['SleevePlacketButton'] = (isset($value['SleevePlacketButton'])) ? $value['SleevePlacketButton'] : '';
                $shirtDetailItem['Label'] = (isset($value['Label'])) ? $value['Label'] : '';
                $shirtDetailItem['Class'] = (isset($value['Class'])) ? $value['Class'] : '';
                array_push($shirtDetail, $shirtDetailItem);
            }

            DB::table('shirtdetail')->insert($shirtDetail);
            DB::commit();

            Session::flash('globalSuccessMsg', 'Order Saved.');
            Session::flash('alert-class', 'alert-success');


            // Save Order ID for future use
            Session::put('ProcessOrderId', $orderID);

            return Redirect::to('checkout');
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                Session::flash('globalErrMsg', $this->errorMsg);
                Session::flash('alert-class', 'alert-danger');
            } else {
                Session::flash('globalErrMsg', $this->errorMsg);
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect()->back();

        }
    }

    public function checkout()
    {
        $CartData = $this->getCartData();
        $userId = Session::get('CustomerID');
        // Get Customer Detail
        $getUserDetail = DB::table('customers')
            ->select('*')
            ->where("ID", "=", $userId)
            ->first();

        $DiscountType = Session::get('DiscountType');
        $Discount = Session::get('Discount');

        $goToPaypal = true;
        $getTotal = $this->getTotal();
        if($Discount >= $getTotal){
            $goToPaypal = false;
        }else{
            $goToPaypal = true;
        }

        $showDiscountField = ($DiscountType != "") ? true : false;

        //dd($goToPaypal);
        $data = array(
            'CartData' => $CartData,
            'ShipCharges' => Session::get('ShipCharges'),
            'Customer' => $getUserDetail,
            'goToPaypal' => $goToPaypal,
            'showDiscountField' => $showDiscountField,
            'discountAmount' => $Discount,
            'discountType' =>($DiscountType == 'Discount') ? 'Discount' : 'Gift Card Discount'
        );
        return view('client/checkout', $data);
    }

}