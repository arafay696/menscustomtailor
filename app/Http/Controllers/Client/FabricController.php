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
                ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName', 'img.ZoomImg', 'pd.RefID as PatternType')
                ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
                ->join('ProductDetails as pd', 'pd.ProductID', '=', 'pr.ID')
                //->whereIn('pd.RefID', [614, 148, 616])
                ->groupBy('pd.RefID')
                ->get();

            $patternById = array();
            $patterNameByID = array(
                148 => 'Stripes',
                614 => 'Solids',
                616 => 'Checks'
            );

            $allColors = DB::table('CP')
                ->select('*')
                ->where('MPID', 28)
                ->get();
            $colorById = array();
            foreach ($allColors as $color) {
                $colorById[$color->ID] = $color->Name;
            }

            //dd($colorById);
            $productColor = array();
            foreach ($products as $product) {
                if ($product->PatternType == 148 || $product->PatternType == 614 || $product->PatternType == 616) {
                    $patternById[$product->ID] = $patterNameByID[$product->PatternType];
                } else {
                    if (array_key_exists((int)$product->PatternType, $colorById)) {
                        if(array_key_exists($product->ID,$productColor)){
                            array_push($productColor[$product->ID],$colorById[$product->PatternType]);
                        }else{
                            $productColor[$product->ID] = array($colorById[$product->PatternType]);
                        }

                    }
                }
            }
            dd($productColor);
            //dd($patternById);

            $data = array(
                'products' => $products,
                'patternByID' => $patternById
            );
            return view('client.fabric', $data);
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
            Session::put('chooseQty', $request::all());
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('fabric/customize/new')) . '');
        }
        $chooseFabs = array();
        if (Request::isMethod('post')) {
            $chooseFabs = $request::get('chooseFab');
        } else {
            $chooseFabs = Session::get('chooseFabs');
            //Session::forget('chooseFabs');
        }

        //dd($chooseFabs);
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
                    $data[0]['Qty'] = Session::get('chooseQty')['Qty_' . $productId];

                } else if (!is_int($findKey)) {
                    $data[$getCount] = array();
                    $data[$getCount]['ProductImage'] = $product[0]->ImgName;
                    $data[$getCount]['ProductName'] = $product[0]->Name;
                    $data[$getCount]['Price'] = $product[0]->Price;
                    $data[$getCount]['productID'] = $product[0]->ID;
                    $data[$getCount]['Qty'] = Session::get('chooseQty')['Qty_' . $productId];
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