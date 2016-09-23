<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 8/28/2016
 * Time: 8:05 PM
 */

namespace App\Http\Controllers\Admin;

use URL;
use DB;
use Request;
use Redirect;
use Input;
use Session;
use Auth;
use Storage;
use File;

class OrderController extends BaseController
{

    public function orders()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $orders = DB::table('orders as o')
                ->select('c.ID as CustomerID', 'o.ID as OrderID', 'o.OrderType', 'c.Name', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->get();

            $data = array(
                'orders' => $orders
            );
            return view('admin/order/orderListing', $data);
        } catch (\Exception $e) {
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

    public function giftOrders()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $orders = DB::table('giftcards')
                ->select('*')
                ->get();

            $data = array(
                'orders' => $orders
            );
            return view('admin/order/giftOrderListing', $data);
        } catch (\Exception $e) {
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

    public function orderDetail($orderID, $customerID)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $orderDetail = DB::table('orders as o')
                ->select('c.ID as CustomerID', 'o.ID as OrderID', 'o.DeliveryDate', 'o.OrderType', 'c.Name', 'c.Email', 'o.ShippingAddress', 'c.Phone', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->where('o.ID', '=', $orderID)
                ->where('c.ID', '=', $customerID)
                ->first();

            //dd($orderDetail);

            $sizeDetail = DB::table('size as s')
                ->select('*')
                ->where('s.CustomerID', '=', $customerID)
                ->first();

            $shirtDetail = DB::table('shirtdetail as sd')
                ->select('*')
                ->where('sd.OrderID', '=', $orderID)
                ->get();

            $data = array(
                'orderDetail' => $orderDetail,
                'sizeDetail' => $sizeDetail,
                'shirtDetail' => $shirtDetail,
                'customerID' => $customerID,
                'orderID' => $orderID,
            );
            return view('admin/order/orderDetail', $data);
        } catch (\Exception $e) {
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

    public function newOrderView()
    {
        return view('admin/order/new');
    }

    public function editStyle($shirtID, $orderID, $customerID)
    {
        // get Shirt Detail by Order ID
        $shirtDetail = DB::table('shirtdetail as sd')
            ->select('p.Price', 'sd.*')
            ->join('products AS p', 'sd.FabricCode', '=', 'p.Code')
            ->where('sd.ID', '=', $shirtID)
            ->first();

        //dd($shirtDetail->CollarStyle);
        $data = array(
            'shirtID' => $shirtID,
            'shirtDetail' => $shirtDetail,
            'backStyle' => $this->getData('backStyle'),
            'NoOfPockets' => $this->getData('NoOfPockets'),
            'MonoColor' => $this->getData('MonoColor'),
            'MonoPosition' => $this->getData('MonoPosition'),
            'CuffStyle' => $this->getData('CuffStyle'),
            'Label' => $this->getData('Label'),
            'orderID' => $orderID,
            'customerID' => $customerID,
        );

        return view('admin/order/editStyle', $data);
    }

    public function editStylePost(Request $request)
    {
        try {
            DB::beginTransaction();
            // get Shirt Detail by Order ID
            $shirtDetail = DB::table('shirtdetail as sd')
                ->select('p.Price', 'sd.*')
                ->join('products AS p', 'sd.FabricCode', '=', 'p.Code')
                ->where('sd.ID', '=', $request::get('shirtDetailID'))
                ->first();

            $value = $request::except('shirtDetailID');
            $orderID = $request::get('orderID');
            $fabricPrice = $request::get('FabricPrice');
            $fabricOldPrice = $shirtDetail->Price;

            $orderDetail = DB::table('orders as o')
                ->select('*')
                ->where('o.ID', '=', $orderID)
                ->first();
            $orderStatus = $orderDetail->Status;
            $orderAmount = $orderDetail->Amount;
            $orderPaid = $orderDetail->Paid;
            if ($orderStatus == 1) {
                $check = $orderAmount - $fabricOldPrice;
                $newAmount = $check + $fabricPrice;
                if ($orderAmount != $newAmount) {
                    $order = array();
                    $order['Status'] = 2;
                    $order['Amount'] = $newAmount;
                    $order['Paid'] = $newAmount - $orderPaid;
                    DB::table('orders')
                        ->where('ID', $orderID)
                        ->update($order);
                }
            } else if ($orderStatus == 2) {
                $order = array();
                $check = ($orderAmount - $fabricOldPrice) + $fabricPrice;
                $order['Amount'] = $check;
                $order['Paid'] = $check - $orderPaid;
                DB::table('orders')
                    ->where('ID', $orderID)
                    ->update($order);
            }

            $customerID = $request::get('customerID');

            $shirtDetailItem = array();

            $shirtDetailItem['FabricCode'] = $value['FabricCode'];
            $shirtDetailItem['FabricColor'] = 'Black';
            $shirtDetailItem['FabricContents'] = 'FabricContents';

            $shirtDetailItem['FabricPrice'] = $value['FabricPrice'];
            $shirtDetailItem['Total'] = $value['FabricPrice'];;
            $shirtDetailItem['CollarStyle'] = (isset($value['CollarStyle'])) ? $value['CollarStyle'] : '';

            $shirtDetailItem['CollarLength'] = (isset($value['CollarLength'])) ? $value['CollarLength'] : '';
            $shirtDetailItem['CollarHeight'] = (isset($value['CollarHeight'])) ? $value['CollarHeight'] : '';
            $shirtDetailItem['WhiteCollar'] = (isset($value['WhiteCollar'])) ? $value['WhiteCollar'] : 0;

            $shirtDetailItem['CollarStays'] = (isset($value['CollarStays'])) ? $value['CollarStays'] : 0;
            $shirtDetailItem['FrontStyle'] = (isset($value['FrontStyle'])) ? $value['FrontStyle'] : '';
            $shirtDetailItem['BackStyle'] = (isset($value['BackStyle'])) ? $value['BackStyle'] : '';

            $shirtDetailItem['CuffStyle'] = (isset($value['CuffStyle'])) ? $value['CuffStyle'] : '';
            $shirtDetailItem['WhiteCuffs'] = (isset($value['WhiteCuffs'])) ? $value['WhiteCuffs'] : 0;
            $shirtDetailItem['Monogram'] = (isset($value['Monogram'])) ? $value['Monogram'] : '';

            $shirtDetailItem['MonoPosition'] = (isset($value['MonoPosition'])) ? $value['MonoPosition'] : '';
            $shirtDetailItem['MonoColor'] = (isset($value['MonoColor'])) ? $value['MonoColor'] : '';
            $shirtDetailItem['MonoInitials'] = (isset($value['MonoInitials'])) ? $value['MonoInitials'] : '';

            $shirtDetailItem['PocketStyle'] = (isset($value['PocketStyle'])) ? $value['PocketStyle'] : '';
            $shirtDetailItem['NumberOfPockets'] = (isset($value['NoOfPockets'])) ? $value['NoOfPockets'] : '';
            $shirtDetailItem['Dat'] = date('Y-m-d H:i:s');

            $shirtDetailItem['Fit'] = (isset($value['Fit'])) ? $value['Fit'] : 0;
            $shirtDetailItem['Label'] = (isset($value['Label'])) ? $value['Label'] : '';
            $shirtDetailItem['Status'] = 1;

            DB::table('shirtdetail')
                ->where('ID', $request::get('shirtDetailID'))
                ->update($shirtDetailItem);;
            DB::commit();

            Session::flash('globalSuccessMsg', 'Updated Successfully :)');
            Session::flash('alert-class', 'alert-success');
            return Redirect::to('/admin/order/' . $orderID . '/' . $customerID);
        } catch (\Exception $e) {
            DB::rollback();
            if (env('Mode') == 'Development') {
                $error = $e->getMessage();
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

    public function addDiscountView()
    {
        return view('admin/discount/generator');
    }

    public function generateDiscount(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $discount = array();

        $discount['UserID'] = date('Y-m-d H:i:s');
        $discount['DiscountCode'] = $request::get('code');
        $discount['DiscountPercent'] = $request::get('discountPercentage');
        $discount['Description'] = $request::get('description');
        $discount['StartDate'] = date('Y-m-d H:i:s', strtotime($request::get('startDate')));
        $discount['EndDate'] = date('Y-m-d H:i:s', strtotime($request::get('endDate')));
        $discount['Status'] = $request::get('status');

        try {
            DB::beginTransaction();
            $uid = DB::table('discountcode')->insertGetId($discount);

            DB::commit();

            Session::flash('globalSuccessMsg', 'Discount Code Generated.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/user/users');
        } catch (\Exception $e) {
            DB::rollback();
            if (env('Mode') == 'Development') {
                $error = $e->getMessage();
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

    public function getDiscountList()
    {
        try {

            $discounts = DB::table('discountcode')
                ->select('*')
                ->get();

            $data = array(
                'discounts' => $discounts
            );

            return view('admin/discount/listing', $data);
        } catch (\Exception $e) {
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

    public function changeStatusDiscount($status, $id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('discountcode')->where('ID', $id)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);


        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Status'] = ($status == 'active') ? 1 : 0;
        }


        try {
            DB::table('discountcode')
                ->where('ID', $id)
                ->update($updatedata);

            DB::commit();

            Session::flash('message', 'Successfully Updated');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/discount/list');
            // all good
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

    public function getSizeByCID($userId)
    {

        try {
            $getSize = DB::table('size')
                ->select('*')
                ->where("CustomerID", "=", $userId)
                ->first();

            $data = array(
                'status' => true,
                'size' => $getSize
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = array(
                'status' => false
            );
            echo json_encode($data);
        }

    }

    public function saveSizeAndOrder(Request $request)
    {
        //print_r($request::all()['BodyProportion']); exit;
        try {
            DB::beginTransaction();
            $userId = $request::get('CustomerID');

            // Check Already Size exist - Insert Or update
            $getSize = DB::table('size')
                ->select('ID', 'CustomerID')
                ->where("CustomerID", "=", $userId)
                ->first();

            // Save Size
            $sizeDetail = array();
            $sizeDetail['CustomerID'] = $userId;
            $value = $request::except('CustomerID');
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


            if (count($getSize) <= 0 && !is_array($getSize)) {
                $sizeID = DB::table('size')->insertGetId($sizeDetail);
            } else {
                $CustomerID = $getSize->CustomerID;
                $sizeID = $getSize->ID;
                DB::table('size')->where('CustomerID', $CustomerID)->update($sizeDetail);
            }

            // Get Price,Amount & Other Charges
            $OrderDetailItems = $request::except('_token');

            /*
             * --- Save Order
             * */
            $orderDetail = array();
            $orderDetail['CustomerID'] = $userId;
            $orderDetail['GOrderNo'] = mt_rand(1, 5000);
            $orderDetail['Code'] = mt_rand(1, 5000);
            $orderDetail['OrderType'] = '';
            $orderDetail['PlacedFor'] = 'MCT';
            $orderDetail['Price'] = $request::get('ProductPrice');
            $orderDetail['OtherItem'] = '';
            $orderDetail['SalesTax'] = 0;
            $orderDetail['Discount'] = 0;
            $orderDetail['Shiping'] = 0;
            $orderDetail['Deal'] = '';
            $orderDetail['Mono'] = 0;
            $orderDetail['WhiteCollar'] = 0;
            $orderDetail['WhiteCuff'] = 0;
            $orderDetail['PleatedFront'] = 0;
            $orderDetail['TuxFront'] = 0;
            $orderDetail['LessShirt'] = '';
            $orderDetail['Custom'] = '';
            $orderDetail['OverSize'] = '';
            $orderDetail['Pocket'] = 0;
            $orderDetail['Rush'] = '';
            $orderDetail['Sleeve'] = '';
            $orderDetail['Tail'] = '';
            $orderDetail['DiffCollar'] = 0;
            $orderDetail['Amount'] = $OrderDetailItems['ProductPrice'];
            $orderDetail['Paid'] = 0;
            $orderDetail['TransferTo'] = $request::get('CustomerName');
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
            $orderDetail['ShipMethod'] = '';
            $orderDetail['CustomerName'] = $request::get('CustomerName');
            $orderDetail['ShippingAddress'] = '';
            $orderDetail['SizeID'] = $sizeID;
            $orderDetail['Site'] = 'MCT';
            $orderDetail['DirectShipment'] = '';
            $orderDetail['NotSure'] = '';
            $orderDetail['MailingID'] = $request::get('CustomerEmail');
            $orderDetail['Extra'] = '';
            $orderDetail['ExtraCharges'] = '';

            $orderID = DB::table('orders')->insertGetId($orderDetail);
            DB::commit();

            $data = array(
                'status' => true,
                'orderID' => $orderID,
                'sizeID' => $sizeID,
                'OrderDate' => date('d F Y', strtotime(date('Y-m-d')))
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $data = array(
                    'status' => false,
                    'msg' => $error
                );
            } else {
                $data = array(
                    'status' => false,
                    'msg' => $error
                );
            }
            echo json_encode($data);
        }
    }

    public function saveStyle(Request $request)
    {
        try {
            DB::beginTransaction();
            $userId = $request::get('CustomerID');

            $value = $request::except('CustomerID');
            $shirtDetailItem = array();
            $shirtDetailItem['OrderID'] = $value['OrderID'];
            $shirtDetailItem['SizeID'] = $value['SizeID'];
            $shirtDetailItem['FabricCode'] = mt_rand(0, 9999);
            $shirtDetailItem['FabricColor'] = 'Black';
            $shirtDetailItem['FabricContents'] = 'FabricContents';
            $shirtDetailItem['Qty'] = $value['Qty'];
            $shirtDetailItem['FabricPrice'] = $value['ProductPrice'];
            $shirtDetailItem['Total'] = $value['ProductPrice'];;
            $shirtDetailItem['ExtraCharges'] = 0;
            $shirtDetailItem['Discount'] = 0;
            $shirtDetailItem['CollarStyle'] = (isset($value['CollarStyle'])) ? $value['CollarStyle'] : '';
            $shirtDetailItem['CollarLength'] = (isset($value['CollarLength'])) ? $value['CollarLength'] : '';
            $shirtDetailItem['CollarHeight'] = (isset($value['CollarHeight'])) ? $value['CollarHeight'] : '';
            $shirtDetailItem['WhiteCollar'] = (isset($value['WhiteCollar'])) ? $value['WhiteCollar'] : 0;
            $shirtDetailItem['CollarTieSpace'] = (isset($value['CollarTieSpace'])) ? $value['CollarTieSpace'] : 0;
            $shirtDetailItem['CollarStays'] = (isset($value['CollarStays'])) ? $value['CollarStays'] : 0;
            $shirtDetailItem['CollarLining'] = (isset($value['CollarLining'])) ? $value['CollarLining'] : 0;
            $shirtDetailItem['CollarStitch'] = (isset($value['CollarStitch'])) ? $value['CollarStitch'] : 0;
            $shirtDetailItem['FrontStyle'] = (isset($value['FrontStyle'])) ? $value['FrontStyle'] : '';
            $shirtDetailItem['FrontClosure'] = (isset($value['FrontClosure'])) ? $value['FrontClosure'] : '';
            $shirtDetailItem['BackStyle'] = (isset($value['BackStyle'])) ? $value['BackStyle'] : '';
            $shirtDetailItem['ShirtBottomStyle'] = (isset($value['ShirtBottomStyle'])) ? $value['ShirtBottomStyle'] : '';
            $shirtDetailItem['CuffStyle'] = (isset($value['CuffStyle'])) ? $value['CuffStyle'] : '';
            $shirtDetailItem['WhiteCuffs'] = (isset($value['WhiteCuffs'])) ? $value['WhiteCuffs'] : 0;
            $shirtDetailItem['CuffLining'] = (isset($value['CuffLining'])) ? $value['CuffLining'] : 0;
            $shirtDetailItem['CuffStitch'] = (isset($value['CuffStitch'])) ? $value['CuffStitch'] : 0;
            $shirtDetailItem['HalfSleeve'] = (isset($value['HalfSleeve'])) ? $value['HalfSleeve'] : 0;
            $shirtDetailItem['Monogram'] = (isset($value['Monogram'])) ? $value['Monogram'] : '';
            $shirtDetailItem['MonoPosition'] = (isset($value['MonoPosition'])) ? $value['MonoPosition'] : '';
            $shirtDetailItem['MonoColor'] = (isset($value['MonoColor'])) ? $value['MonoColor'] : '';
            $shirtDetailItem['MonoInitials'] = (isset($value['MonoInitials'])) ? $value['MonoInitials'] : '';
            $shirtDetailItem['PocketStyle'] = (isset($value['PocketStyle'])) ? $value['PocketStyle'] : '';
            $shirtDetailItem['NumberOfPockets'] = (isset($value['NoOfPockets'])) ? $value['NoOfPockets'] : '';
            $shirtDetailItem['PleatedPocket'] = (isset($value['PleatedPocket'])) ? $value['PleatedPocket'] : '';
            $shirtDetailItem['PocketFlaps'] = (isset($value['PocketFlaps'])) ? $value['PocketFlaps'] : '';
            $shirtDetailItem['ShirtType'] = (isset($value['ShirtType'])) ? $value['ShirtType'] : '';
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
            $shirtDetailItem['ShipToCustomer'] = $value['CustomerName'];
            $shirtDetailItem['CustomerShipDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
            $shirtDetailItem['StatusID'] = 1;
            $shirtDetailItem['ShirtStatus'] = 1;
            $shirtDetailItem['Status'] = 1;
            $shirtDetailItem['SleevePlacketButton'] = (isset($value['SleevePlacketButton'])) ? $value['SleevePlacketButton'] : '';
            $shirtDetailItem['Label'] = (isset($value['Label'])) ? $value['Label'] : '';
            $shirtDetailItem['Class'] = (isset($value['Class'])) ? $value['Class'] : '';

            $shirtDetailID = DB::table('shirtdetail')->insertGetId($shirtDetailItem);
            DB::commit();

            $data = array(
                'status' => true,
                'shirtDetailID' => $shirtDetailID
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $data = array(
                    'status' => false,
                    'msg' => $error
                );
            } else {
                $data = array(
                    'status' => false,
                    'msg' => $error
                );
            }
            echo json_encode($data);
        }

    }

    public function myMeasurementsEdit(Request $request)
    {
        $sizeDetail['SizeOption'] = '';
        $sizeDetail['HeightInches'] = $request::get('HeightInches');
        $sizeDetail['HeightFeet'] = $request::get('HeightFeet');
        $sizeDetail['Weight'] = $request::get('Weight');
        $sizeDetail['NeckHeight'] = $request::get('NeckHeight');
        $sizeDetail['NeckSize'] = $request::get('NeckSize');
        $sizeDetail['LeftSleeve'] = $request::get('SleeveLength');
        $sizeDetail['RightSleeve'] = $request::get('SleeveLength');
        $sizeDetail['Chest'] = $request::get('Chest');
        $sizeDetail['Waist'] = $request::get('Waist');
        $sizeDetail['Posture'] = $request::get('Posture');
        $sizeDetail['ChestDescription'] = $request::get('ChestDescription');
        $sizeDetail['BodyShape'] = $request::get('BodyShape');
        $sizeDetail['BodyProportion'] = $request::get('BodyProportion');
        $sizeDetail['Shoulder'] = $request::get('Shoulder');
        $sizeDetail['Dat'] = date('Y-m-d H:i:s');
        $sizeDetail['ShirtNeckSize'] = $request::get('NeckHeight');
        $sizeDetail['Yoke'] = $request::get('Yoke');
        $sizeDetail['Tail'] = $request::get('Tail');
        $sizeDetail['ShoulderLine'] = $request::get('ShoulderLine');
        $sizeDetail['ArmType'] = $request::get('ArmType');

        // Check Already Size exist - Insert Or update
        $userId = $request::get('customerID');
        $getSize = DB::table('size')
            ->select('ID', 'CustomerID')
            ->where("CustomerID", "=", $userId)
            ->first();

        try {
            DB::beginTransaction();
            $msg = '';
            if (count($getSize) <= 0 && !is_array($getSize)) {
                $msg = 'Size Save :)';
                $sizeID = DB::table('size')->insertGetId($sizeDetail);
            } else {
                $msg = 'Size updated :)';
                $CustomerID = $getSize->CustomerID;
                $sizeID = $getSize->ID;
                DB::table('size')->where('CustomerID', $CustomerID)->update($sizeDetail);
            }

            DB::commit();
            Session::flash('globalSuccessMsg', $msg);
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
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
}