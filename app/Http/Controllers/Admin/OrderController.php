<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 8/28/2016
 * Time: 8:05 PM
 */

namespace App\Http\Controllers\Admin;

use URL;
use DB;
use Request;
use Redirect;
use Input;
use Session;
use Auth;
use Storage;
use File;

class OrderController extends BaseController
{

    public function orders()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $orders = DB::table('orders as o')
                ->select('c.ID as CustomerID', 'o.ID as OrderID', 'o.OrderType', 'c.Name', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->get();

            $data = array(
                'orders' => $orders
            );
            return view('admin/order/orderListing', $data);
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

    public function orderDetail($orderID, $customerID)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $orderDetail = DB::table('orders as o')
                ->select('c.ID as CustomerID', 'o.ID as OrderID', 'o.DeliveryDate', 'o.OrderType', 'c.Name', 'c.Email', 'o.ShippingAddress', 'c.Phone', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
                ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
                ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
                ->where('o.ID', '=', $orderID)
                ->where('c.ID', '=', $customerID)
                ->first();

            //dd($orderDetail);

            $sizeDetail = DB::table('size as s')
                ->select('*')
                ->where('s.CustomerID', '=', $customerID)
                ->first();

            $shirtDetail = DB::table('shirtdetail as sd')
                ->select('*')
                ->where('sd.OrderID', '=', $orderID)
                ->get();

            $data = array(
                'orderDetail' => $orderDetail,
                'sizeDetail' => $sizeDetail,
                'shirtDetail' => $shirtDetail,
            );
            return view('admin/order/orderDetail', $data);
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

    public function newOrderView()
    {
        return view('admin/order/new');
    }

    public function addDiscountView()
    {
        return view('admin/discount/generator');
    }

    public function generateDiscount(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $discount = array();

        $discount['UserID'] = date('Y-m-d H:i:s');
        $discount['DiscountCode'] = $request::get('code');
        $discount['Description'] = $request::get('description');
        $discount['StartDate'] = date('Y-m-d H:i:s', strtotime($request::get('startDate')));
        $discount['EndDate'] = date('Y-m-d H:i:s', strtotime($request::get('endDate')));
        $discount['Status'] = $request::get('status');

        try {
            DB::beginTransaction();
            $uid = DB::table('discountcode')->insertGetId($discount);

            DB::commit();

            Session::flash('globalSuccessMsg', 'Discount Code Generated.');
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

    public function getDiscountList()
    {
        try {

            $discounts = DB::table('discountcode')
                ->select('*')
                ->get();

            $data = array(
                'discounts' => $discounts
            );

            return view('admin/discount/listing', $data);
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

    public function changeStatusDiscount($status, $id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $getUser = DB::table('discountcode')->where('ID', $id)
            ->get();
        DB::setFetchMode(\PDO::FETCH_CLASS);


        $updatedata = array();
        foreach ($getUser as $data) {
            $updatedata = $data;
            $updatedata['Status'] = ($status == 'active') ? 1 : 0;
        }


        try {
            DB::table('discountcode')
                ->where('ID', $id)
                ->update($updatedata);

            DB::commit();

            Session::flash('message', 'Successfully Updated');
            Session::flash('alert-class', 'alert-success');

            return Redirect::to('admin/discount/list');
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

    }
}