<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/19/2016
 * Time: 11:13 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use URL;

class UserController extends Controller
{

    public function index()
    {
        return view('admin/user.login');
    }

    public function home()
    {
        return view('admin/index');
    }
}