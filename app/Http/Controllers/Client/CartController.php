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
        $userId = Session::get('CustomerID');
        $getSize = DB::table('size')
            ->select('*')
            ->where("CustomerID", "=", $userId)
            ->first();
        dd($getSize);
        $cartData = $this->getCartData();
        $data = array(
            'cart' => $cartData
        );
        return view('client/cart', $data);
    }

    public function RemoveItem($key)
    {
        $data = $this->getCartData();
        unset($data[$key]);
        Session::put('CartData', $data);
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
            foreach ($data as $value) {
                $sizeDetail = array();
                $sizeDetail['CustomerID'] = 1;
                $sizeDetail['SizeOption'] = '';
                $sizeDetail['HeightInches'] = $value['HeightInches'];
                $sizeDetail['HeightFeet'] = $value['HeightFeet'];
                $sizeDetail['Weight'] = $value['Weight'];
                $sizeDetail['NeckHeight'] = $value['NeckHeight'];
                $sizeDetail['NeckSize'] = $value['NeckSize'];
                $sizeDetail['LeftSleeve'] = '';
                $sizeDetail['RightSleeve'] = '';
                $sizeDetail['Chest'] = $value['Chest'];
                $sizeDetail['Waist'] = $value['Waist'];
                $sizeDetail['Hips'] = '';
                $sizeDetail['Yoke'] = '';
                $sizeDetail['Tail'] = '';
                $sizeDetail['LeftCuff'] = '';
                $sizeDetail['RightCuff'] = '';
                $sizeDetail['FittingOption'] = '';
                $sizeDetail['Posture'] = $value['Posture'];
                $sizeDetail['ChestDescription'] = $value['ChestDescription'];
                $sizeDetail['ArmType'] = $value['ArmType'];
                $sizeDetail['BodyShape'] = $value['BodyShape'];
                $sizeDetail['BodyProportion'] = $value['BodyProportion'];
                $sizeDetail['ShoulderLine'] = '';
                $sizeDetail['Shoulder'] = $value['Shoulder'];
                $sizeDetail['ExtraShirtTail'] = '';
                $sizeDetail['ShorterShirtTail'] = '';
                $sizeDetail['FitAroundChestShoulder'] = '';
                $sizeDetail['FitAroundWaist'] = '';
                $sizeDetail['CoatSize'] = '';
                $sizeDetail['PantSize'] = '';
                $sizeDetail['Inseam'] = '';
                $sizeDetail['Status'] = 'A';
                $sizeDetail['Comments'] = '';
                $sizeDetail['Dat'] = date('Y-m-d H:i:s');
                $sizeDetail['CoatLength'] = '';
                $sizeDetail['Confirm'] = '';
                $sizeDetail['SleeveFullnessInBicep'] = '';
                $sizeDetail['ArmHole'] = '';
                $sizeDetail['RaiseCollar'] = '';
                $sizeDetail['SleeveFullnessIntoCuff'] = '';
                $sizeDetail['BackDart'] = '';
                $sizeDetail['ScoopFrontNeck'] = '';
                $sizeDetail['SalesPerson'] = '';
                $sizeDetail['DecideOn'] = '';
                $sizeDetail['ShirtNeckSize'] = $value['NeckSize'];
                $sizeDetail['ShirtLength'] = '';
                $sizeDetail['MidSection'] = '';
                $sizeDetail['BiggestChallenge'] = '';

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

            /*
             * --- Save Order
             * */
            $orderDetail = array();
            $orderDetail['CustomerID'] = $userId;
            $orderDetail['GOrderNo'] = mt_rand(1, 5000);
            $orderDetail['Code'] = mt_rand(1, 5000);
            $orderDetail['OrderType'] = '';
            $orderDetail['PlacedFor'] = '';
            $orderDetail['Price'] = $OrderDetailItems['TotalPrice'];
            $orderDetail['OtherItem'] = '';
            $orderDetail['SalesTax'] = 2;
            $orderDetail['Discount'] = 2;
            $orderDetail['Shiping'] = $OrderDetailItems['Shipping'];
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
            $orderDetail['Amount'] = $OrderDetailItems['Amount'];
            $orderDetail['Paid'] = 0;
            $orderDetail['TransferTo'] = $CustomerName;
            $orderDetail['Status'] = 1;
            $orderDetail['TrackingNo'] = mt_rand(1, 5000);
            $orderDetail['OnTime'] = '';
            $orderDetail['Must'] = '';
            $orderDetail['Comments'] = '';
            $orderDetail['Description'] = '';
            $orderDetail['StatusText'] = '';
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
                $shirtDetailItem['FabricCode'] = mt_rand(0, 9999);
                $shirtDetailItem['FabricColor'] = 'Black';
                $shirtDetailItem['FabricContents'] = 'FabricContents';
                $shirtDetailItem['Qty'] = 1;
                $shirtDetailItem['FabricPrice'] = $value['Price'];
                $shirtDetailItem['Total'] = $total;
                $shirtDetailItem['ExtraCharges'] = 0;
                $shirtDetailItem['Discount'] = 0;
                $shirtDetailItem['CollarStyle'] = $value['collarType'];
                $shirtDetailItem['CollarLength'] = $value['NeckHeight'];
                $shirtDetailItem['CollarHeight'] = $value['NeckHeight'];
                $shirtDetailItem['WhiteCollar'] = isset($value['whiteCollar']) ? $value['whiteCollar'] : 0;
                $shirtDetailItem['CollarTieSpace'] = '';
                $shirtDetailItem['CollarStays'] = '';
                $shirtDetailItem['CollarLining'] = '';
                $shirtDetailItem['CollarStitch'] = '';
                $shirtDetailItem['FrontStyle'] = $value['frontStyle'];
                $shirtDetailItem['FrontClosure'] = '';
                $shirtDetailItem['BackStyle'] = '';
                $shirtDetailItem['ShirtBottomStyle'] = '';
                $shirtDetailItem['CuffStyle'] = $value['cuffStyle'];
                $shirtDetailItem['WhiteCuffs'] = isset($value['whiteCuff']) ? $value['whiteCuff'] : 0;
                $shirtDetailItem['CuffLining'] = '';
                $shirtDetailItem['CuffStitch'] = '';
                $shirtDetailItem['HalfSleeve'] = '';
                $shirtDetailItem['Monogram'] = $value['monogramStyle'];
                $shirtDetailItem['MonoPosition'] = $value['monogramLocation'];
                $shirtDetailItem['MonoColor'] = $value['monogramColor'];
                $shirtDetailItem['MonoInitials'] = $value['monogramIntials'];
                $shirtDetailItem['PocketStyle'] = $value['pocketStyle'];
                $shirtDetailItem['NumberOfPockets'] = $value['noOfPocket'];
                $shirtDetailItem['PleatedPocket'] = '';
                $shirtDetailItem['PocketFlaps'] = '';
                $shirtDetailItem['ShirtType'] = $value['shirtType'];
                $shirtDetailItem['Deal'] = '';
                $shirtDetailItem['StyleComments'] = '';
                $shirtDetailItem['Dat'] = date('Y-m-d H:i:s');
                $shirtDetailItem['Fit'] = '';
                $shirtDetailItem['FedEx'] = '';
                $shirtDetailItem['TransferToLevel1'] = '';
                $shirtDetailItem['TransferDate1'] = '';
                $shirtDetailItem['Level1PromiseDate'] = '';
                $shirtDetailItem['Level1TentitiveDate'] = '';
                $shirtDetailItem['Level1Ship'] = '';
                $shirtDetailItem['ShipDate1'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['TransferToLevel2'] = '';
                $shirtDetailItem['TransferDate2'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['Level2Ship'] = '';
                $shirtDetailItem['ShipDate2'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['ShipToCustomer'] = $CustomerName;
                $shirtDetailItem['CustomerShipDate'] = date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s') . ' + 10 days'));
                $shirtDetailItem['StatusID'] = 1;
                $shirtDetailItem['ShirtStatus'] = 1;
                $shirtDetailItem['Status'] = 1;
                $shirtDetailItem['SleevePlacketButton'] = '';
                $shirtDetailItem['Label'] = '';
                $shirtDetailItem['Class'] = '';
                array_push($shirtDetail, $shirtDetailItem);
            }

            DB::table('shirtdetail')->insert($shirtDetail);
            DB::commit();

            Session::flash('globalSuccessMsg', 'Order Saved.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('/');
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
        return view('client/checkout');
    }
}