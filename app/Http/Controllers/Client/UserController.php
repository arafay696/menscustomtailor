<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;


class UserController extends BaseController
{

    public function index()
    {

        return view('client.loginRegister');
    }
}