<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 8/6/2016
 * Time: 3:10 PM
 */

namespace App\Http\Controllers\Client;

use Session;
use Redirect;
use DB;

class CartController extends BaseController
{
    public function index()
    {
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

    public function SaveData()
    {
        try {
            $data = $this->getCartData();
            $userId = Session::get('customerID');
            $userId = 1;
            $getSize = DB::table('size')
                ->select('ID', 'CustomerID')
                ->where("CustomerID", "=", $userId)
                ->first();

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
            DB::beginTransaction();

            if (count($getSize) <= 0 && !is_array($getSize)) {
                $sizeID = DB::table('size')->insertGetId($sizeDetail);
                dd('New Inserted'. $sizeID);
            } else {
                $CustomerID = $getSize->CustomerID;
                DB::table('Products')->where('CustomerID', $CustomerID)->update($sizeDetail);
                dd('Updated');
            }

            $shirtDetail = array();
            $shirtDetail[] = '';
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            dd($error);
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