<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;

use App\Customer;
use URL;
use DB;
use Request;
use Hash;
use Session;
use Redirect;
use Validator;
use Auth;

class UserController extends BaseController
{

    public function index()
    {
        $returnUrl = Request::get('returnUrl');
        return view('client.loginRegister')->with('returnUrl', $returnUrl);
    }

    public function doLogin()
    {
        try {

            $rules = array(
                'email' => 'required|email', // make sure the email is an actual email
                'password' => 'required' // password can only be alphanumeric and has to be greater than 3 characters
            );

            // run the validation rules on the inputs from the form
            $validator = Validator::make(Request::all(), $rules);

            // if the validator fails, redirect back to the form
            if ($validator->fails()) {
                return Redirect::back()
                    ->withErrors($validator)// send back all errors to the login form
                    ->withInput(Request::except('password')); // send back the input (not the password) so that we can repopulate the form
            } else {

                // create our user data for the authentication
                $userdata = array(
                    'Email' => Request::get('email'),
                    'Password' => Request::get('password')
                );

                $user = Customer::where('Email', '=', $userdata['Email'])
                    ->first();

                if (count($user) <= 0 && empty($user)) {
                    return Redirect::back()->withErrors("Account detail's not Match.");
                }

                $uid = $user->ID;
                $uPass = $user->Password;
                $uName = $user->Name;
                $uEmail = $user->Email;

                if (Hash::check($userdata['Password'], $uPass)) {
                    Auth::login($user, true);
                } else {
                    return Redirect::back()->withErrors("Account detail's not Match.");
                }
                // attempt to do the login


                if (Auth::check()) {
                    Session::put('CustomerID', $uid);
                    Session::put('CustomerName', $uName);
                    Session::put('CustomerEmail', $uEmail);
                    Session::put('CustomerLogintime', date('Y-m-d H:i:s'));

                    if (Request::get('returnUrl') == "") {
                        return Redirect::to('/');
                    } else {
                        return Redirect::to(Request::get('returnUrl'));
                    }
                } else {
                    // validation not successful, send back to form
                    return Redirect::back()->withErrors('Login Failed. Please Try again');
                }
            }

        } catch (\Exception $e) {
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

    public function logout()
    {
        Session::forget('CustomerID');
        Session::forget('CustomerName');
        Session::forget('CustomerEmail');
        Session::forget('CustomerLogintime');
        Session::flush();
        Auth::logout(); // log the user out of our application
        return Redirect::to('/login'); // redirect the user to the login screen
    }
}