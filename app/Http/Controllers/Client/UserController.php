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
        Session::forget('chooseFabs');
        Session::forget('chooseQty');
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

        try {

            $orders = DB::table('orders as o')
                ->select('o.ID', 'o.Amount', 'o.OrderDate', 'o.Code')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->where('c.ID', '=', Session::get('CustomerID'))
                ->orderBy('o.OrderDate', 'DESC')
                ->get();

            $data = array(
                'orders' => $orders
            );

            return view('client.orderhistory', $data);
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

    public function orderDetail($orderID)
    {
        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('order-history')) . '');
        }

        try {

            $orderDetail = DB::table('orders as o')
                ->select('c.ID as CustomerID', 'o.ID as OrderID', 'o.DeliveryDate', 'o.OrderType', 'c.Name', 'c.Email', 'o.ShippingAddress', 'c.Phone', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->where('o.ID', '=', $orderID)
                ->where('c.ID', '=', Session::get('CustomerID'))
                ->first();

            $shirtDetail = DB::table('shirtdetail as sd')
                ->select('sd.Qty', 'pr.Code', 'pr.Name', 'pr.Price', 'sd.FabricCode', 'sd.CollarStyle', 'sd.FrontStyle', 'sd.Monogram', 'sd.MonoPosition', 'sd.MonoColor', 'sd.MonoInitials')
                ->join('products AS pr', 'sd.FabricCode', '=', 'pr.Code')
                ->where('sd.OrderID', '=', $orderID)
                ->orderBy('sd.Dat', 'DESC')
                ->get();

            //dd($shirtDetail);
            $data = array(
                'orderDetail' => $orderDetail,
                'shirtDetail' => $shirtDetail,
                'OrderID' => $orderID
            );

            //dd($shirtDetail);
            return view('client/orderDetail', $data);
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

        $returnUrl = urlencode($request::get('returnUrl'));

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

            Session::flash('registered', 'ok');
            Session::flash('globalSuccessMsg', 'User Added.');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('login?returnUrl=' . $returnUrl . '');
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

    public function myMeasurements()
    {
        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('order-history')) . '');
        }

        $getSize = DB::table('size')
            ->select('*')
            ->where("CustomerID", "=", Session::get('CustomerID'))
            ->first();

        //Session::put('currentCSize', $getSize);
        $data = array(
            'size' => $getSize,
            'customerID' => Session::get('CustomerID'),
            'NeckSize' => $this->getData('NeckSize')
        );
        //dd($getSize->NeckHeight);
        return view('client/my_measurements', $data);
    }

    public function myMeasurementsEdit(Request $request)
    {
        $sizeDetail['SizeOption'] = '';
        $sizeDetail['HeightInches'] = $request::get('HeightInches');
        $sizeDetail['HeightFeet'] = $request::get('HeightFeet');
        $sizeDetail['Weight'] = $request::get('Weight');
        $sizeDetail['NeckHeight'] = $request::get('NeckHeight');
        $sizeDetail['NeckSize'] = $request::get('NeckSize');
        $sizeDetail['LeftSleeve'] = $request::get('SleeveLength');
        $sizeDetail['RightSleeve'] = $request::get('SleeveLength');
        $sizeDetail['Chest'] = $request::get('Chest');
        $sizeDetail['Waist'] = $request::get('Waist');
        $sizeDetail['Posture'] = $request::get('Posture');
        $sizeDetail['ChestDescription'] = $request::get('ChestDescription');
        $sizeDetail['BodyShape'] = $request::get('BodyShape');
        $sizeDetail['BodyProportion'] = $request::get('BodyProportion');
        $sizeDetail['Shoulder'] = $request::get('Shoulder');
        $sizeDetail['Dat'] = date('Y-m-d H:i:s');
        $sizeDetail['ShirtNeckSize'] = $request::get('NeckHeight');

        // Check Already Size exist - Insert Or update
        $userId = $request::get('customerID');
        $getSize = DB::table('size')
            ->select('ID', 'CustomerID')
            ->where("CustomerID", "=", $userId)
            ->first();

        try {
            DB::beginTransaction();
            $msg = '';
            if (count($getSize) <= 0 && !is_array($getSize)) {
                $msg = 'Size Save :)';
                $sizeID = DB::table('size')->insertGetId($sizeDetail);
            } else {
                $msg = 'Size updated :)';
                $CustomerID = $getSize->CustomerID;
                $sizeID = $getSize->ID;
                DB::table('size')->where('CustomerID', $CustomerID)->update($sizeDetail);
            }

            DB::commit();
            Session::flash('globalSuccessMsg', $msg);
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

    public function saveToPDF(){
        echo 'Pending.......';
    }

    public function generateInvoice($orderID){
        $getDetail = DB::table('orders AS o')
            ->select('o.ID as OrderID','o.Price as SubTotal','i.Name as Image','o.ID','p.Name', 'sd.Qty','sd.FabricPrice', 'o.Amount as Total', 'o.Discount','o.Shiping')
            ->join("shirtdetail AS sd","o.ID","=","sd.OrderID")
            ->join("products AS p","sd.FabricCode","=","p.Code")
            ->join("images as i","p.ID","=","i.RefID")
            ->where("o.ID", "=", $orderID)
            ->groupBy("i.RefID")
            ->get();
        if(count($getDetail) > 0){
            echo json_encode(array(
               'status' => true,
                'data' => $getDetail
            ));
        }else{
            echo json_encode(array(
                'status' => false,
                'data' => 'No Detail found'
            ));
        }
    }
}