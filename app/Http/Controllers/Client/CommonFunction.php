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
                "12","12 &frac14;","12 &frac12;","12 &frac34;",
                "13","13 &frac14;","13 &frac12;","13 &frac34;",
                "14","14 &frac14;","14 &frac12;","14 &frac34;",
                "15","15 &frac14;","15 &frac12;","15 &frac34;",
                "16","16 &frac14;","16 &frac12;","16 &frac34;",
                "17","17 &frac14;","17 &frac12;","17 &frac34;",
                "18","18 &frac14;","18 &frac12;","18 &frac34;",
                "19","19 &frac14;","19 &frac12;","19 &frac34;",
                "20","20 &frac14;","20 &frac12;","20 &frac34;",
                "21","21 &frac14;","21 &frac12;","21 &frac34;",
                "22","22 &frac14;","22 &frac12;","22 &frac34;",
                "23","23 &frac14;","23 &frac12;","23 &frac34;",
                "24","24 &frac14;","24 &frac12;","24 &frac34;",
            )
        );

        return $detail[$key];
    }

}