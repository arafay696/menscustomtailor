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
use DB;
use Request;
use PhpSpec\Exception\Exception;
use Hash;
use Session;
use Redirect;
use Validator;
use Auth;
use Mail;

class UserController extends Controller
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

    public function doLogin(Request $request)
    {
        $company = $request::get('company');
        $email = $request::get('email');
        $password = $request::get('password');

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
                    'Email' => $email,
                    'Password' => $password
                );

                $user = DB::table('merchants')->where('Email', $email)->get();

                if (empty($user)) {
                    return Redirect::back()->withErrors('Email Not Match.');
                }

                $uid = $user[0]->ID;
                $uPass = $user[0]->Password;

                //dd('heelo');
                if (Hash::check($userdata['Password'], $uPass)) {
                    Auth::login($user, true);
                } else {
                    return Redirect::back()->withErrors('Login Failed.');
                }
                // attempt to do the login
                if (Auth::check()) {
                    Session::put('userID', $uid);
                    Session::put('logintime', date('Y-m-d H:i:s'));

                    return Redirect::to('admin/home');
                } else {
                    // validation not successful, send back to form
                    return Redirect::back()->withErrors('Login Failed.');
                }
            }

        } catch (\Exception $e) {
            $error = $e->getMessage();
            //dd($e->getTrace());
            if (env('Mode') == 'Development') {

                Session::flash('globalErrMsg', $error);
                Session::flash('alert-class', 'alert-danger');
            } else {
                Session::flash('globalErrMsg', $error);
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect()->back();
        }
        return view('admin/index');
    }

    public function home()
    {
        return view('admin/index');
    }
}