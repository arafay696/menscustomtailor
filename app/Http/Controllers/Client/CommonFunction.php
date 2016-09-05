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

}