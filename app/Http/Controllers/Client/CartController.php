<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 8/6/2016
 * Time: 3:10 PM
 */

namespace App\Http\Controllers\Client;


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
}