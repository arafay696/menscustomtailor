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
            )
        );

        return $detail[$key];
    }

}