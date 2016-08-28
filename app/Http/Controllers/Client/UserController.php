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
use Input;

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
                $uImg = $user->UserImg;

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
                    Session::put('CustomerImg', $uImg);

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

    public function profile()
    {
        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('profile')) . '');
        }

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('customers')
            ->select('Email', 'Name', 'City', 'Country', 'Phone', 'Company', 'Gender', 'Address', 'UserImg')
            ->where('ID', Session::get('CustomerID'))
            ->first();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        $data = array(
            'userDetail' => $getUser
        );
        return view('client.profile', $data);
    }

    public function orderHistory()
    {
        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('order-history')) . '');
        }
        return view('client.orderhistory');
    }

    public function newsletter()
    {
        return view('client.newsletter');
    }

    public function changePassword()
    {
        return view('client.changePassword');
    }

    public function addUser(Request $request)
    {

        $user = array();

        $user['Dat'] = date('Y-m-d H:i:s');
        $user['Email'] = $request::get('Email');
        $user['Password'] = Hash::make($request::get('Password'));
        $user['Name'] = $request::get('Name');
        $user['Status'] = 1;

        if ($request::get('Password') != $request::get('ConfirmPassword')) {
            Session::flash('globalErrMsg', "Password not match");
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back()->withInput();
        }

        try {
            DB::beginTransaction();
            $uid = DB::table('customers')->insertGetId($user);

            DB::commit();

            Session::flash('globalSuccessMsg', 'User Added.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            if (env('Mode') == 'Development') {
                $error = $e->getMessage();
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

    public function updateuser()
    {
        $userID = Session::get('CustomerID');

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('customers')->where('ID', $userID)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        $fileName = false;
        if (Request::hasFile('UserImg')) {
            $files = Input::file('UserImg');
            $fileName = $this->UploadImages($files);
        }


        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Name'] = Request::get('Name');
            $updatedata['Phone'] = Request::get('Phone');
            $updatedata['Address'] = Request::get('Address');

            $updatedata['City'] = Request::get('City');
            $updatedata['Country'] = Request::get('Country');
            $updatedata['Gender'] = Request::get('Gender');
            $updatedata['Company'] = Request::get('Company');

            if (Request::hasFile('UserImg')) {
                $updatedata['UserImg'] = $fileName;
            }
        }


        try {
            DB::table('customers')
                ->where('ID', $userID)
                ->update($updatedata);

            DB::commit();

            Session::flash('globalSuccessMsg', 'Updated.');
            Session::flash('alert-class', 'alert-success');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
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

    public function updatepassword()
    {
        $userID = Session::get('CustomerID');
        $password = Request::get('Password');

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('customers')->where('ID', $userID)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        foreach ($getUser as $userData) {
            $currentPassword = $userData['Password'];
        }

        if (!(Hash::check($password, $currentPassword)) || $password == "") {
            Session::flash('globalErrMsg', "Current Password Not Matched");
            Session::flash('alert-class', 'alert-danger');
            return Redirect::back();
        }


        $newPassword = Request::get('NewPassword');
        $RePassword = Request::get('ConfirmPassword');

        if ($newPassword != $RePassword) {
            Session::flash('globalErrMsg', "New Password Not Match");
            Session::flash('alert-class', 'alert-danger');
            return Redirect::back()->withErrors("New Password Not Match");
        }

        $updatePassword = Hash::make($newPassword);

        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Password'] = $updatePassword;
        }

        try {
            DB::table('customers')
                ->where('ID', $userID)
                ->update(array('Password' => $updatePassword));

            DB::commit();

            Session::flash('globalSuccessMsg', 'Password Successfully Updated');
            Session::flash('alert-class', 'alert-success');

            return Redirect::back();
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('globalErrMsg', $this->errorMsg);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }
    }

    public function UploadImages($files)
    {
        // SET UPLOAD PATH
        $destinationPath = 'resources/assets/userimages';

        $file = $files;
        // GET THE FILE EXTENSION
        $extension = $file->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = rand(11111, 99999) . '.' . $extension;
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $file->move($destinationPath, $fileName);

        if ($upload_success) {
            return $fileName;
        } else {
            return false;
        }
    }


}