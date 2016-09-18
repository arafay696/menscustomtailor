<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;

use DB;
use Illuminate\Support\Facades\Session;
use Mail;

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
            ->select('c.Name', 'cr.Review', 'c.UserImg')
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

    public function giftCard()
    {
        // Send Email to Recipient
        /*$recData = array(
            'Subject' => 'Gift Card Received',
            'name' => "Men's Custom Tailor",
            'code' => '123',
            'from' => 'arafay696@gmail.com',
            'msg' => 'arafay696@gmail.com',
            'email' => 'arafay696@gmail.com',
            'price' => 123
        );

        Mail::send('client.giftcardEmailReceived', $recData, function ($message) use ($recData) {
            $message->subject($recData['Subject'])
                ->to($recData['email']);
        });*/

        return view('client.giftCard');
    }
}
