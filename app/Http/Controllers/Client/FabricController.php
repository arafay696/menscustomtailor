<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/30/2016
 * Time: 11:56 AM
 */

namespace App\Http\Controllers\Client;

use DB;
use League\Flysystem\Exception;
use Redirect;
use Request;
use Session;
use Auth;
use URL;
use View;

class FabricController extends BaseController
{

    public function index(Request $request)
    {
        $info = array(
            'title' => "Fabric - Custom Dress Shirts - MEN'S CUSTOM TAILOR"
        );
        View::share('info', $info);

        $filter = $request::get('filter');
        try {
            $products = DB::table('Products AS pr')
                ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName', 'img.ZoomImg', 'pd.RefID as PatternType')
                ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
                ->join('ProductDetails as pd', 'pd.ProductID', '=', 'pr.ID')
                //->whereIn('pd.RefID', [614, 148, 616])
                //->groupBy('pd.RefID')
                ->orderBy('pr.Dat', 'desc')
                ->get();

            //dd($products);
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

            $allCategories = DB::table('ProductDetails')
                ->select('*')
                ->where('RefTable', 'Categories')
                ->get();
            $categoryById = array();
            foreach ($allCategories as $rs) {
                $categoryById[$rs->ProductID][] = $rs->RefID;
            }

            $categories = DB::table('Categories')
                ->select('ID', 'Name')
                ->where("ProductTypeID", "=", 6)
                ->get();

            $productColor = array();
            foreach ($products as $product) {
                if ($product->PatternType == 148 || $product->PatternType == 614 || $product->PatternType == 616) {
                    $patternById[$product->ID] = $patterNameByID[$product->PatternType];
                } else {
                    if (array_key_exists((int)$product->PatternType, $colorById)) {
                        if (array_key_exists($product->ID, $productColor)) {
                            array_push($productColor[$product->ID], $colorById[$product->PatternType]);
                        } else {
                            $productColor[$product->ID] = array($colorById[$product->PatternType]);
                        }

                    }
                }
            }
            //dd($productColor);
            //dd($patternById);

            $data = array(
                'products' => $products,
                'patternByID' => $patternById,
                'productColor' => $productColor,
                'filter' => $filter,
                'categories' => $categories,
                'categoryById' => $categoryById
            );
            return view('client.fabric', $data);
        } catch (\Exception $e) {

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
            ->select('pr.ID', 'pr.Name', 'pr.Price', 'img.Name as ImgName', 'pr.Code')
            ->join('Images AS img', 'pr.ID', '=', 'img.RefID')
            ->where('pr.ID', '=', $id)
            ->where('img.ZoomImg', '=', 0)
            ->get();

        return $product;
    }

    public function customizebyID($id)
    {
        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('fabric')) . '');
        }

        $cartData = $this->getCartData();
        if (count($cartData) <= 0) {
            return Redirect::to('fabric');
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

        $productId = (int)$id;
        $sendData = array(
            'productID' => $productId,
            'cartData' => $cartData,
            'NoOfPockets' => $this->getData('NoOfPockets'),
            'NeckSize' => $this->getData('NeckSize')
        );

        //echo (isset(Session::get('currentSize')['NeckSize'])) && Session::get('currentSize')['NeckSize'] == "12 1/4" ? "selected=selected" : "";
        //dd(Session::get('currentSize'));
        return view('client.customize', $sendData);
    }

    public function customize(Request $request)
    {
        /*if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('fabric')) . '');
        }*/

        // check if not set then save in session
        if (!Session::has('chooseFabs') || !Session::has('chooseQty')) {
            Session::put('chooseFabs', $request::get('chooseFab'));
            Session::put('chooseQty', $request::all());
        }

        if (count(Session::get('chooseFabs')) <= 0) {
            Session::flash('globalErrMsg', "Please Choose at least one item.");
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('fabric');
        }

        // check if value added OR delete
        if (count(Session::get('chooseFabs')) < count($request::get('chooseFab'))) {
            Session::put('chooseFabs', $request::get('chooseFab'));
            Session::put('chooseQty', $request::all());
        }

        if (!Session::has('CustomerID')) {
            return Redirect::to('login?returnUrl=' . urlencode(URL::to('fabric/customize/new')) . '');
        }

        if (Request::isMethod('post')) {
            $chooseFabs = $request::get('chooseFab');
        } else {
            $chooseFabs = Session::get('chooseFabs');
            //Session::forget('chooseFabs');
        }

        //dd(Session::get('chooseQty'));
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
        if (count($chooseFabs) > 0) {
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
                        $data[0]['ProductCode'] = $product[0]->Code;
                        $data[0]['Qty'] = Session::get('chooseQty')['Qty_' . $productId];

                    } else if (!is_int($findKey)) {
                        $data[$getCount] = array();
                        $data[$getCount]['ProductImage'] = $product[0]->ImgName;
                        $data[$getCount]['ProductName'] = $product[0]->Name;
                        $data[$getCount]['Price'] = $product[0]->Price;
                        $data[$getCount]['productID'] = $product[0]->ID;
                        $data[$getCount]['ProductCode'] = $product[0]->Code;
                        $data[$getCount]['Qty'] = Session::get('chooseQty')['Qty_' . $productId];
                    } else {

                    }
                    $this->setCartData('CartData', $data);
                }
            }
        }


        $sendData = array(
            'productID' => $choosen,
            'cartData' => $this->getCartData(),
            'NoOfPockets' => $this->getData('NoOfPockets'),
            'NeckSize' => $this->getData('NeckSize'),
        );
        $itemSelected = $this->getCartData();
        //dd($itemSelected);
        $ShareData = array(
            'itemSelected' => $itemSelected
        );
        View::share('ShareData', $ShareData);
        return view('client.customize', $sendData);

    }


    public function setCustomizeValues(Request $request)
    {
        if ($request::has('makeSame')) {
            $makeSame = $request::get('makeSame');
            Session::put('makeSame', $makeSame);
        }

        $productId = (int)$request::get('productID');
        $product = $this->validProduct($productId);
        $where = null;
        if (count($product) > 0) {
            $data = $this->getCartData();
            $findKey = $this->findInArrayByValue($productId, 'productID', $data);
            $getCount = count($data);
            if (!Session::has('makeSame') || Session::get('makeSame') == 'no') {
                if ($getCount <= 0 && !is_array($data)) {
                    $where = 'in 1';
                    $data = array();
                    $data[0]['ProductImage'] = $product[0]->ImgName;
                    $data[0]['ProductName'] = $product[0]->Name;
                    $data[0]['Price'] = $product[0]->Price;
                    foreach ($request::except('_token') as $key => $value) {
                        $data[0][$key] = ($key == 'productID') ? (int)$value : $value;
                    }
                } else if (!is_int($findKey)) {
                    $where = 'in 2';
                    $data[$getCount] = array();
                    $data[$getCount]['ProductImage'] = $product[0]->ImgName;
                    $data[$getCount]['ProductName'] = $product[0]->Name;
                    $data[$getCount]['Price'] = $product[0]->Price;
                    foreach ($request::except('_token') as $key => $value) {
                        $data[$getCount][$key] = ($key == 'productID') ? (int)$value : $value;
                    }
                } else {
                    $where = 'in 3';
                    foreach ($request::except('_token') as $key => $value) {
                        $data[$findKey][$key] = ($key == 'productID') ? (int)$value : $value;
                    }
                }
            } else {
                $where = 'in 4';
                for ($i = 0; $i < $getCount; $i++) {
                    foreach ($request::except('_token') as $key => $value) {
                        if ($key !== 'productID') {
                            $data[$i][$key] = $value;
                        }
                    }
                }

            }
            $this->setCartData('CartData', $data);
            echo json_encode(array(
                'status' => true,
                'message' => $where,
                'total' => $getCount
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Product not exist'
            ));
        }
    }

    public function LoadSizeMagic(Request $request)
    {
        try {
            $loadSizeOrNot = ($request::get('choosenOption') == 'Yes') ? true : false;
            if (!$loadSizeOrNot) {
                Session::put('isUpdateSize', false);
            } else {
                Session::put('isUpdateSize', true);
                $data = $this->getCartData();
                if (count($data) > 0) {
                    $getCurrentSize = Session::get('currentSize');
                    if ($getCurrentSize) {
                        //$getCurrentSize = json_decode(json_encode($getCurrentSize), true);
                        for ($i = 0; $i < count($data); $i++) {
                            foreach ($getCurrentSize as $key => $value) {
                                $data[$i][$key] = $value;
                            }
                        }
                        $this->setCartData('CartData', $data);
                    }
                }
            }

            echo json_encode(array(
                'status' => true,
                'data' => $this->getCartData()
            ));
        } catch (\Exception $e) {
            echo json_encode(array(
                'status' => false,
                'message' => $e->getMessage()
            ));
        }

    }
}