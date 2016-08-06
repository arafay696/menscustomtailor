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

    public function SaveData(){
        $sizeDetail = array();
        $sizeDetail['CustomerID'] = '';
        $sizeDetail['SizeOption'] = '';
        $sizeDetail['HeightInches'] = '';
        $sizeDetail['HeightFeet'] = '';
        $sizeDetail['HeightFeet'] = '';
        $sizeDetail['Weight'] = '';
        $sizeDetail['NeckHeight'] = '';
        $sizeDetail['NeckSize'] = '';
        $sizeDetail['LeftSleeve'] = '';
        $sizeDetail['RightSleeve'] = '';
        $sizeDetail['Chest'] = '';
        $sizeDetail['Waist'] = '';
        $sizeDetail['Hips'] = '';
        $sizeDetail['Yoke'] = '';
        $sizeDetail['Tail'] = '';
        $sizeDetail['LeftCuff'] = '';
        $sizeDetail['RightCuff'] = '';
        $sizeDetail['FittingOption'] = '';
        $sizeDetail['Posture'] = '';
        $sizeDetail['ChestDescription'] = '';
        $sizeDetail['ArmType'] = '';
        $sizeDetail['BodyShape'] = '';
        $sizeDetail['BodyProportion'] = '';
        $sizeDetail['ShoulderLine'] = '';
        $sizeDetail['Shoulder'] = '';
        $sizeDetail['ExtraShirtTail'] = '';
        $sizeDetail['ShorterShirtTail'] = '';
        $sizeDetail['FitAroundChestShoulder'] = '';
        $sizeDetail['FitAroundWaist'] = '';
        $sizeDetail['CoatSize'] = '';
        $sizeDetail['PantSize'] = '';
        $sizeDetail['Inseam'] = '';
        $sizeDetail['Status'] = '';
        $sizeDetail['Comments'] = '';
        $sizeDetail['Dat'] = '';
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
        $sizeDetail['ShirtNeckSize'] = '';
        $sizeDetail['ShirtLength'] = '';
        $sizeDetail['MidSection'] = '';
        $sizeDetail['BiggestChallenge'] = '';

        $shirtDetail = array();
        $shirtDetail[] = '';
    }
}