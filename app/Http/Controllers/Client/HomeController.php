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
use Request;
use App;
use PDF;
use View;

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
        /* $recData = array(
             'Subject' => 'Gift Card Received',
             'name' => "Men's Custom Tailor",
             'code' => '123',
             'from' => 'info.menscustomtailor@gmail.com',
             'msg' => 'arafay696@gmail.com',
             'email' => 'info.menscustomtailor@gmail.com',
             'price' => 123
         );

         Mail::send('client.giftcardEmailReceived', $recData, function ($message) use ($recData) {
             $message->subject($recData['Subject'])
                 ->to($recData['email']);
         });*/
        //dd('ello');
        //return view('client.aboutus');
        return view('client.view-gift');
    }

    public function saveImage(Request $request)
    {
        $imagedata = base64_decode($request::get('imgdata'));
        $filename = md5(uniqid(rand(), true));

        //path where you want to upload image
        //$file = $_SERVER['DOCUMENT_ROOT'] . '/uploads/' . $filename . '.png';
        $file = public_path('assets/client/images/') . $filename . '.png';
        $imageurl = 'http://example.com/uploads/' . $filename . '.png';
        file_put_contents($file, $imagedata);
        $data = file_get_contents($file);
        $base64 = 'data:image/png;base64,' . base64_encode($data);
        echo json_encode(
            array(
                'image_url' => $filename . '.png',
                'image_base' => $base64
            )
        );
    }

    public function testPdf()
    {
        $orders = DB::table('orders as o')
            ->select('o.ID', 'o.Amount', 'o.OrderDate', 'o.Code')
            ->join('customers as c', 'o.CustomerID', '=', 'c.ID')
            ->join('orderstatus as os', 'o.Status', '=', 'os.ID')
            ->where('c.ID', '=', Session::get('CustomerID'))
            //->where('o.Status', '=', 1)
            ->orderBy('o.OrderDate', 'DESC')
            ->get();

        $getUser = DB::table('customers')
            ->select('Name','Email','Phone','City','Country','Address')
            ->where("ID", "=", Session::get('CustomerID'))
            ->first();

        $getSize = DB::table('size')
            ->select('*')
            ->where("CustomerID", "=", Session::get('CustomerID'))
            ->first();

        $data = array(
            'orders' => $orders,
            'user' => $getUser,
            'size' => $getSize
        );
        //$pdf = PDF::loadView('client.pdf-invoice', $data);
        //return $pdf->stream();
        //return $pdf->download('te.pdf');
    }
}
