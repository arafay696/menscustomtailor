<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use URL;
use DB;
use Request;
use Redirect;

class ProductController extends BaseController
{

    public function getProductCategories()
    {
        try {
            $productCategories = DB::table('MP')
                ->join('CP', "MP.ID", "=", "CP.MPID")
                ->select('MP.Name as MainCategory', 'MP.Type', 'CP.Name', 'CP.ID')
                ->where("MP.ProductTypeID", "=", 6)
                ->get();

            $returnData = array();
            $processCategories = array();
            foreach ($productCategories as $rs) {
                $cat = $rs->MainCategory;
                if (!in_array($cat, $processCategories)) {
                    $string = preg_replace('/\s+/', '', $cat);
                    $returnData[$string] = array();
                    foreach ($productCategories as $rs1) {
                        if ($rs1->MainCategory === $cat) {
                            array_push($returnData[$string], $rs1);
                        }
                    }
                    array_push($processCategories, $cat);
                    unset($cat);
                }
            }

            $categories = DB::table('Categories')
                ->select('ID', 'Name')
                ->where("ProductTypeID", "=", 6)
                ->get();

            $returnData['categories'] = $categories;
            echo json_encode($returnData);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

    public function addProduct(Request $request)
    {
        $return = array(
            'status' => false,
            'msg' => ''
        );

        $product = array();

        $product['ProductTypeID'] = $request::get('ProductTypeID');
        $product['MerchantID'] = $request::get('MerchantID');
        $product['Basic'] = $request::get('Basic');
        $product['Qty'] = $request::get('Qty');

        $product['QtySold'] = $request::get('QtySold');
        $product['Price'] = $request::get('Price');
        $product['Weight'] = $request::get('Weight');
        $product['Code'] = $request::get('Code');

        $product['Name'] = $request::get('Name');
        $product['Description'] = $request::get('Description');
        $product['MetaTitle'] = $request::get('MetaTitle');
        $product['MetaKeywords'] = $request::get('MetaKeywords');

        $product['MetaDescription'] = $request::get('MetaDescription');
        $product['Dat'] = date('Y-m-d H:i:s');
        $product['EnableExpiry'] = ($request::get('EnableExpiry')) ? 1 : 0;
        $product['ExpiryDate'] = $request::get('EnableExpiryDate');

        $product['Pos'] = 0;
        $product['Status'] = 'A';
        $product['MRID'] = 0;
        $product['MRProductID'] = 0;

        $product['Linked'] = 0;

        $productDetailMain = array();
        try {
            $pid = DB::table('Products')->insertGetId($product);


            foreach ($request::get('Categories') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('ColorID') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('ContrastColorID') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('CustomType') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('FabricType') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }


            $productDetail = array();
            $productDetail['ProductID'] = $pid;
            $productDetail['RefTable'] = 'CP';
            $productDetail['RefID'] = (int)$request::get('Opacity');
            $productDetail['Extra'] = '';

            $productDetail['POS'] = 0;
            $productDetail['Def'] = '';

            array_push($productDetailMain, $productDetail);


            foreach ($request::get('Patterns') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('Season') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            foreach ($request::get('ShirtStyle') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }


            DB::table('ProductDetails')->insert($productDetailMain);

            $return['status'] = true;
            $return['msg'] = 'Product Added.';
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $return['msg'] = $this->errorMsg;
            } else {
                $return['msg'] = $this->errorMsg;
            }

        }

        echo json_encode($return);
    }

}