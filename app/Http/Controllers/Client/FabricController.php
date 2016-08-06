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

    public function customize($id)
    {
        $product = $this->validProduct($id);
        if (count($product) > 0) {
            $data = array(
                'productID' => $id
            );
            return view('client.customize', $data);
        } else {
            return Redirect::to('/fabric');
        }

    }

    public function setCustomizeValues(Request $request)
    {
        $productId = $request::get('productID');
        $product = $this->validProduct($productId);
        if (count($product) > 0) {
            $getCartData = $this->getCartData();
            $findKey = $this->findInArrayByValue($productId, 'productID', $getCartData);
            if (is_bool($findKey) === true) {
                $data = array();
                $data[0]['ProductImage'] = $product[0]->ImgName;
                $data[0]['ProductName'] = $product[0]->Name;
                $data[0]['Price'] = $product[0]->Price;
                foreach ($request::except('_token') as $key => $value) {
                    $data[0][$key] = $value;
                }
            } else {
                $data = $getCartData;
                foreach ($request::except('_token') as $key => $value) {
                    $data[$findKey][$key] = $value;
                }
            }
            $this->setCartData('CartData', $data);
            //print_r($this->getCartData());
            echo json_encode(array(
                'status' => true,
                'message' => $this->getCartData()
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Product not exist'
            ));
        }
    }
}