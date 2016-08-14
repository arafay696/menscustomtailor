<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;

use DB;
use Redirect;
use Request;
use Session;
use Auth;
use URL;
use View;

class FabricController extends BaseController
{

    public function index()
    {
        try {

            $products = DB::table('Products AS pr')
                ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName', 'img.ZoomImg')
                ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
                ->groupBy('pr.ID')
                ->get();

            $return['products'] = $products;

            return view('client.fabric', $return);
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

            return Redirect::to('/');
        }

    }

    public function validProduct($id)
    {
        $product = DB::table('Products AS pr')
            ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName')
            ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
            ->where('pr.ID', '=', $id)
            ->where('img.ZoomImg', '=', 0)
            ->get();

        return $product;
    }

    public function customizebyID($id)
    {
        $cartData = $this->getCartData();
        if (count($cartData) <= 0) {
            return Redirect::to('fabric');
        }

        $productId = (int)$id;
        $sendData = array(
            'productID' => $productId,
            'cartData' => $cartData
        );

        return view('client.customize', $sendData);
    }

    public function customize(Request $request)
    {
        if (!Session::has('CustomerID')) {
            Session::put('chooseFabs', $request::get('chooseFab'));
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('fabric/customize/new')) . '');
        }

        $chooseFabs = array();
        if (Request::isMethod('post')) {
            $chooseFabs = $request::get('chooseFab');
        } else {
            $chooseFabs = Session::get('chooseFabs');
            //Session::forget('chooseFabs');
        }

        // Init Size if Size saved already
        $userId = Session::get('CustomerID');
        DB::setFetchMode(\Pdo::FETCH_ASSOC);
        $getSize = DB::table('size')
            ->select('*')
            ->where("CustomerID", "=", $userId)
            ->first();
        DB::setFetchMode(\Pdo::FETCH_CLASS);
        if (count($getSize) > 0) {
            Session::put('currentSize', $getSize);
        } else {
            Session::put('currentSize', false);
        }

        // Init Size if Size saved already End

        $choosen = 0;
        foreach ($chooseFabs as $key => $value) {

            $id = $value;
            $productId = (int)$id;
            if ($key <= 0) {
                $choosen = $productId;
            }
            $product = $this->validProduct($productId);

            if (count($product) > 0) {

                $data = $this->getCartData();

                $findKey = $this->findInArrayByValue($productId, 'productID', $data);

                $getCount = count($data);

                if ($getCount <= 0) {
                    $data = array();
                    $data[0]['ProductImage'] = $product[0]->ImgName;
                    $data[0]['ProductName'] = $product[0]->Name;
                    $data[0]['Price'] = $product[0]->Price;
                    $data[0]['productID'] = $product[0]->ID;

                } else if (!is_int($findKey)) {
                    $data[$getCount] = array();
                    $data[$getCount]['ProductImage'] = $product[0]->ImgName;
                    $data[$getCount]['ProductName'] = $product[0]->Name;
                    $data[$getCount]['Price'] = $product[0]->Price;
                    $data[$getCount]['productID'] = $product[0]->ID;
                } else {

                }
                $this->setCartData('CartData', $data);


            }
        }

        $sendData = array(
            'productID' => $choosen,
            'cartData' => $this->getCartData()
        );
        $itemSelected = $this->getCartData();

        $ShareData = array(
            'itemSelected' => $itemSelected
        );
        View::share('ShareData', $ShareData);
        return view('client.customize', $sendData);

    }


    public function setCustomizeValues(Request $request)
    {
        $productId = (int)$request::get('productID');
        $product = $this->validProduct($productId);
        if (count($product) > 0) {
            $data = $this->getCartData();
            $findKey = $this->findInArrayByValue($productId, 'productID', $data);
            $getCount = count($data);
            if ($getCount <= 0 && !is_array($data)) {
                $data = array();
                $data[0]['ProductImage'] = $product[0]->ImgName;
                $data[0]['ProductName'] = $product[0]->Name;
                $data[0]['Price'] = $product[0]->Price;
                foreach ($request::except('_token') as $key => $value) {
                    $data[0][$key] = ($key == 'productID') ? (int)$value : $value;
                }
            } else if (!is_int($findKey)) {
                $data[$getCount] = array();
                $data[$getCount]['ProductImage'] = $product[0]->ImgName;
                $data[$getCount]['ProductName'] = $product[0]->Name;
                $data[$getCount]['Price'] = $product[0]->Price;
                foreach ($request::except('_token') as $key => $value) {
                    $data[$getCount][$key] = ($key == 'productID') ? (int)$value : $value;
                }
            } else {
                foreach ($request::except('_token') as $key => $value) {
                    $data[$findKey][$key] = ($key == 'productID') ? (int)$value : $value;
                }
            }
            $this->setCartData('CartData', $data);
            echo json_encode(array(
                'status' => true,
                'message' => $this->getCartData(),
                'total' => $getCount
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Product not exist'
            ));
        }
    }
}