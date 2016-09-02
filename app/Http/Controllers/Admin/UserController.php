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

        $merchants = DB::table('usercompany')
            ->select('id', 'Name')
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
                $uName = $user->Name;
                if (Hash::check($userdata['Password'], $uPass)) {
                    Auth::login($user, true);
                    //dd(Auth::attempt(['Email' => $userdata['Email'], 'Password' => $userdata['Password']]));
                } else {
                    return Redirect::back()->withErrors("Account detail's not Match.");
                }
                // attempt to do the login


                if (Auth::check()) {
                    Session::put('userID', $uid);
                    Session::put('userName', $uName);
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

        return view('admin/dashboard');
    }

    public function getUsers()
    {
        try {

            $id = Session::get('userID');
            $users = DB::table('merchants')
                ->select('ID', 'Email', 'Name', 'Company', 'Country', 'Type', 'Status')
                ->where('ID', '!=', $id)
                ->get();

            $return['status'] = true;
            $return['msg'] = 'Received';
            $return['data'] = $users;

            $StatusByID = $this->getAllStatus();
            $getAllCompanies = $this->getAllCompanies();

            $data = array(
                'users' => $users,
                'StatusByID' => $StatusByID,
                'getAllCompanies' => $getAllCompanies
            );

            return view('admin/user/userListing', $data);
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

    public function getCustomersList()
    {
        try {

            $users = DB::table('customers')
                ->select('ID', 'Email', 'Name', 'Company', 'Country','Phone', 'Status')
                ->get();

            $return['status'] = true;
            $return['msg'] = 'Received';
            $return['data'] = $users;

            $StatusByID = $this->getAllStatus();

            $data = array(
                'users' => $users,
                'StatusByID' => $StatusByID
            );

            return view('admin/customer/listing', $data);
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

    public function getCustomers()
    {
        try {
            $users = DB::table('customers')
                ->select('ID', 'Email', 'Name', 'Phone')
                ->get();

            $data = array(
                'status' => true,
                'users' => $users
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = array(
                'status' => false
            );

            echo json_encode($data);
        }
    }

    public function getAllTypes()
    {
        $merchants = DB::table('merchants')
            ->select('Company')
            ->get();
        $data = array(
            'status' => true,
            'merchants' => $merchants
        );

        echo json_encode($data);
    }

    public function addUserView()
    {
        $status = DB::table('userstatus')
            ->select('ID', 'Name')
            ->get();

        $usercompany = DB::table('usercompany')
            ->select('id', 'Name')
            ->get();

        $data = array(
            'status' => $status,
            'usercompany' => $usercompany
        );
        return view('admin/user/add-user', $data);
    }

    public function addCustomerView()
    {
        $status = DB::table('userstatus')
            ->select('ID', 'Name')
            ->get();

        $data = array(
            'status' => $status
        );
        return view('admin/customer/add', $data);
    }

    public function addCustomer(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $customer = array();

        $customer['Dat'] = date('Y-m-d H:i:s');
        $customer['Email'] = $request::get('Email');
        $customer['Password'] = Hash::make($request::get('Password'));
        $customer['Name'] = $request::get('Name');

        $customer['Phone'] = $request::get('Phone');
        $customer['Company'] = $request::get('Company');
        $customer['Address'] = $request::get('Address');
        $customer['City'] = $request::get('City');

        $customer['Country'] = $request::get('Country');

        $customer['Gender'] = $request::get('Gender');
        $customer['Status'] = $request::get('status');

        try {
            DB::beginTransaction();
            $uid = DB::table('customers')->insertGetId($customer);

            DB::commit();

            Session::flash('globalSuccessMsg', 'Customer Added.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/customer/customers');
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

    public function addUser(Request $request)
    {

        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $user = array();

        $user['Dat'] = date('Y-m-d H:i:s');
        $user['Email'] = $request::get('Email');
        $user['Password'] = Hash::make($request::get('Password'));
        $user['Name'] = $request::get('Name');

        $user['Phone'] = $request::get('Phone');
        $user['Company'] = $request::get('Company');
        $user['Address'] = $request::get('Address');
        $user['City'] = $request::get('City');

        $user['State'] = $request::get('State');
        $user['ZipCode'] = $request::get('ZipCode');
        $user['Country'] = $request::get('Country');
        $user['Type'] = $request::get('Type');
        $user['Flow'] = 0;

        $user['SyncURL'] = '';

        $user['Status'] = $request::get('status');
        $user['Comments'] = '';

        try {
            DB::beginTransaction();
            $uid = DB::table('merchants')->insertGetId($user);

            DB::commit();

            Session::flash('globalSuccessMsg', 'User Added.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/user/users');
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

    public function checkUserLogin()
    {
        $data = array(
            'userLogin' => false,
            'user' => ''
        );

        if (!Auth::check()) {
            echo json_encode($data);
            exit;
        }

        $data = array(
            'userLogin' => true,
            'user' => array(
                'userId' => Session::get('userID'),
                'userName' => Session::get('userName')
            )
        );

        echo json_encode($data);
    }

    public function deleteUser($id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        try {
            DB::table('merchants')->where('ID', '=', $id)->delete();

            Session::flash('globalSuccessMsg', 'User Deleted.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
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

    public function updateuser()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $userID = Request::get('userID');

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('merchants')->where('ID', $userID)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);


        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Name'] = Request::get('Name');
            $updatedata['Phone'] = Request::get('Phone');
            $updatedata['Address'] = Request::get('Address');

            $updatedata['City'] = Request::get('City');
            $updatedata['State'] = Request::get('State');
            $updatedata['Country'] = Request::get('Country');
            $updatedata['ZipCode'] = Request::get('ZipCode');
        }


        try {
            DB::table('merchants')
                ->where('ID', $userID)
                ->update($updatedata);

            DB::commit();

            $returnResult = "Success";
            // all good
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

        if ($returnResult == "Success") {
            Session::flash('message', 'Successfully Updated');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/users/user/' . $userID . '');
        } else {
            return $returnResult;
        }

    }

    public function updatepassword()
    {
        $userID = Request::get('uID');
        $password = Request::get('cpassword');

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('merchants')->where('ID', $userID)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);

        foreach ($getUser as $userData) {
            $currentPassword = $userData['Password'];
        }

        if (!(Hash::check($password, $currentPassword)) || $password == "") {
            return Redirect::back()->withErrors("Current Password Not Matched");
        }


        $newPassword = Request::get('npassword');
        $RePassword = Request::get('repassword');

        if ($newPassword != $RePassword) {
            return Redirect::back()->withErrors("New Password Not Match");
        }

        $updatePassword = Hash::make($newPassword);

        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Password'] = $updatePassword;
        }

        try {
            DB::table('merchants')
                ->where('ID', $userID)
                ->update(array('Password' => $updatePassword));

            DB::commit();

            $returnResult = "Success";
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            Session::flash('globalErrMsg', $this->errorMsg);
            Session::flash('alert-class', 'alert-danger');
            return redirect()->back();
        }

        if ($returnResult == "Success") {
            Session::flash('passwordupdate', 'Password Successfully Updated');
            Session::flash('alert-class', 'alert-success');
            return Redirect::back();
            //return Redirect::to('admin/userprofile/'.$userID.'');
        } else {
            return $returnResult;
        }
    }

    public function getUser($id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        try {
            DB::setFetchMode(\PDO::FETCH_ASSOC);
            $user = DB::table('merchants')
                ->select('ID', 'Dat', 'Email', 'Name', 'Company', 'Country', 'Type', 'Status', 'Phone', 'Address', 'City', 'State', 'ZipCode')
                ->where('ID', '=', $id)
                ->first();
            DB::setFetchMode(\PDO::FETCH_CLASS);

            if (count($user) == 0) {
                Session::flash('globalErrMsg', 'User Not Exist');
                Session::flash('alert-class', 'alert-danger');
                return redirect()->back();
            }
            //dd($user['ID']);
            $data = array(
                'userData' => $user,
                'loginUserID' => $id
            );

            return view('admin/user/userprofile', $data);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $return['msg'] = $this->errorMsg;
            } else {
                $return['msg'] = $this->errorMsg;
            }

            echo json_encode($return);
        }
    }

    public function editUserView($id)
    {
        $user = DB::table('merchants')
            ->select('*')
            ->where('ID', $id)
            ->first();

        //dd($user);
        $status = DB::table('userstatus')
            ->select('ID', 'Name')
            ->get();

        $getAllCompanies = DB::table('usercompany')
            ->select('id', 'Name')
            ->get();

        $selectedStatus = $user->Status;
        $selectedCompany = $user->Company;
        $data = array(
            'user' => $user,
            'userID' => $id,
            'status' => $status,
            'getAllCompanies' => $getAllCompanies,
            'selectedStatus' => $selectedStatus,
            'selectedCompany' => $selectedCompany,
        );
        return view('admin/user/edit-user', $data);
    }

    public function getAllStatus()
    {

        DB::setFetchMode(\Pdo::FETCH_ASSOC);
        $getAllStatus = DB::table('userstatus')
            ->get();
        DB::setFetchMode(\Pdo::FETCH_CLASS);

        /*
        * Set Array key as Status ID
        * Easy to find by ID
        * e.g: $StatusByID[6][0]['Status'] will return Status ID = 6 and
        * Text for this ID
        * */
        foreach ($getAllStatus as $key => $value) {
            $StatusByID[$value['ID']][] = $value;
        }
        return $StatusByID;
    }

    public function getAllCompanies()
    {

        DB::setFetchMode(\Pdo::FETCH_ASSOC);
        $getAllStatus = DB::table('usercompany')
            ->get();
        DB::setFetchMode(\Pdo::FETCH_CLASS);

        /*
        * Set Array key as Status ID
        * Easy to find by ID
        * e.g: $StatusByID[6][0]['Status'] will return Status ID = 6 and
        * Text for this ID
        * */
        foreach ($getAllStatus as $key => $value) {
            $StatusByID[$value['id']][] = $value;
        }
        return $StatusByID;
    }

    public function editUser($id, Request $request)
    {
        $user = array();

        $user['Dat'] = date('Y-m-d H:i:s');
        $user['Password'] = Hash::make($request::get('Password'));
        $user['Name'] = $request::get('Name');

        $user['Phone'] = $request::get('Phone');
        $user['Company'] = $request::get('Company');
        $user['Address'] = $request::get('Address');
        $user['City'] = $request::get('City');

        $user['State'] = $request::get('State');
        $user['ZipCode'] = $request::get('ZipCode');
        $user['Country'] = $request::get('Country');
        $user['Type'] = $request::get('Type');
        $user['Flow'] = 0;

        $user['SyncURL'] = '';

        $user['Status'] = $request::get('status');
        $user['Comments'] = '';

        try {
            DB::beginTransaction();
            DB::table('merchants')->where('ID', $id)->update($user);

            DB::commit();

            Session::flash('globalSuccessMsg', 'User Updated.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/user/users');
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
}