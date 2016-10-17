<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 9/3/2015
 * Time: 11:34 AM
 */

namespace App\Http\Controllers\Client;

use Illuminate\Support\Facades\Auth;
use Redirect;
use Session;
use Config;
use DB;
use Mail;

trait CommonFunction
{

    public $settings;

    function getCartData()
    {
        $data = Session::get('CartData');
        return $data;
    }

    function setCartData($Sessionkey = 'CartData', $data)
    {
        Session::put($Sessionkey, $data);
        return true;
    }


    public function emptyCart()
    {
        Session::forget('CartData');
        Session::forget('TotalAmountIS');
        Session::forget('ShipCharges');
        Session::forget('ProcessOrderId');
        Session::forget('DiscountType');
        Session::forget('Discount');
        Session::forget('CouponCode');
    }

    public function getTotal(){
        $data = $this->getCartData();
        $total = 0;
        foreach ($data as $key => $rs) {
            if ($rs['Price'] > 0) {
                $total += ($rs['Price'] * $rs['Qty']);
            }
        }

        return $total;
    }

    public function findInArrayByValue($findValue, $findColumn, $array)
    {
        if (count($array) > 0) {
            foreach ($array as $key => $rs) {
                if ($rs[$findColumn] === $findValue) {
                    return $key;
                }
            }
        }
        return 'null';
    }

    public function getData($key)
    {
        $detail = array(
            'backStyle' => array(
                'Two Pleats', 'Inverted Pleat Back',
                'Box Pleat', 'Box Pleat Back w. Locker Loop',
                'Smooth Back', 'Yoke Back',
                'Split Yoke Regular Back', 'Split Yoke Smooth Back'),
            'NoOfPockets' => array(
                'No Pocket', 'Single pocket', 'Two pockets'
            ),
            'MonoColor' => array(
                'We Pick', 'Brown',
                'Black', 'Blue',
                'Green', 'Gray',
                'Lavender', 'Maroon',
                'Navy', 'Red',
                'Silver', 'Tan',
                'Yellow', 'Same As Fabric'
            ),
            'MonoPosition' => array(
                'Cuff', 'Chest',
                'Pocket', 'Waist'
            ),
            'CuffStyle' => array(
                'One Button Round', 'One Button Angled',
                'Two Button Round', 'Two Button Angled',
                'Two Button Square', 'One Button Square',
                'French Cuff Square', 'French Cuff Round',
                'French Cuff Angled', 'Convertible Cuff',
                'Italian Tab cuff'
            ),
            'Label' => array(
                'MCT Label', 'Customer Name Label', 'No Label'
            ),
            'NeckSize' => array(
                "12","12 1/4","12 1/2","12 3/4",
                "13","13 1/4","13 1/2","13 3/4",
                "14","14 1/4","14 1/2","14 3/4",
                "15","15 1/4","15 1/2","15 3/4",
                "16","16 1/4","16 1/2","16 3/4",
                "17","17 1/4","17 1/2","17 3/4",
                "18","18 1/4","18 1/2","18 3/4",
                "19","19 1/4","19 1/2","19 3/4",
                "20","20 1/4","20 1/2","20 3/4",
                "21","21 1/4","21 1/2","21 3/4",
                "22","22 1/4","22 1/2","22 3/4",
                "23","23 1/4","23 1/2","23 3/4",
                "24","24 1/4","24 1/2","24 3/4",
            )
        );

        return $detail[$key];
    }

}