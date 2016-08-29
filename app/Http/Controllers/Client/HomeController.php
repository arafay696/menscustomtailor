<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;

use DB;

class HomeController extends BaseController
{

    public function index()
    {
        $products = DB::table('Products AS pr')
            ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName', 'img.ZoomImg')
            ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
            ->groupBy('pr.ID')
            ->get();

        $reviews = DB::table('customer_reviews AS cr')
            ->select('c.Name', 'cr.Review','c.UserImg')
            ->join('customers as c', 'c.ID', '=', 'cr.CustomerID')
            ->get();

        //dd($reviews);
        $data = array(
            'products' => $products,
            'reviews' => $reviews
        );

        return view('client.home', $data);
    }

    public function contactus()
    {
        return view('client.contactus');
    }

    public function aboutus()
    {
        return view('client.aboutus');
    }
}
