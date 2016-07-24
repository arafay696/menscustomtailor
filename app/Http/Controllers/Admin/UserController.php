<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/19/2016
 * Time: 11:13 PM
 */

namespace App\Http\Controllers\Admin;

use App\Merchants;
use URL;
use DB;
use Request;
use Hash;
use Session;
use Redirect;
use Validator;
use Auth;
use Mail;
use App\User;

class UserController extends BaseController
{

    public function index()
    {
        /*$users = DB::table('INFORMATION_SCHEMA.TABLES')
            ->select('TABLE_NAME')
            ->where('TABLE_SCHEMA', 'mct')
            ->where('ENGINE', 'MyISAM')->get();
			dd(count($users));
        foreach ($users as $user)
        {
            $tbl = $user->TABLE_NAME;
            //$tbl($tbl);
            $sql = DB::select( DB::raw("ALTER TABLE `$tbl` ENGINE=INNODB"));
            //dd($sql);
        }*/

        $merchants = DB::table('merchants')
            ->select('Company')
            ->get();
        $data = array(
            'merchants' => $merchants
        );
        return view('admin/user.login', $data);
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
                    'Password' => Request::get('password'),
                    'Company' => Request::get('company'),
                );

                $user = Merchants::where('Email', '=', $userdata['Email'])
                    ->where('Company', '=', $userdata['Company'])
                    ->first();

                if (empty($user)) {
                    return Redirect::back()->withErrors("Account detail's not Match.");
                }

                $uid = $user->ID;
                $uPass = $user->Password;
                if (Hash::check($userdata['Password'], $uPass)) {
                    Auth::login($user, true);
                } else {
                    return Redirect::back()->withErrors("Account detail's not Match.");
                }
                // attempt to do the login


                if (Auth::check()) {
                    Session::put('userID', $uid);
                    Session::put('logintime', date('Y-m-d H:i:s'));

                    return Redirect::to('admin/home');
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
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        Session::forget('userID');
        Session::forget('logintime');
        Auth::logout(); // log the user out of our application
        return Redirect::to('admin/auth/login'); // redirect the user to the login screen
    }

    public function home()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        return view('admin/index');
    }
}