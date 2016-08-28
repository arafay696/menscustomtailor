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
                ->select('c.ID as CustomerID', 'o.ID as OrderID','o.DeliveryDate', 'o.OrderType', 'c.Name', 'c.Email', 'o.ShippingAddress', 'c.Phone', 'o.GOrderNo', 'o.PlacedFor', 'o.OrderDate', 'o.PromiseDate', 'o.Price', 'o.Price', 'o.Paid', 'os.Name as OrderStatus', 'o.StatusText')
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
}