<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use URL;
use DB;
use Request;
use Redirect;
use Input;

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
            DB::beginTransaction();
            $pid = DB::table('Products')->insertGetId($product);

            foreach ($request::except('Categories') as $category) {
                if (is_array($category) && count($category) > 0) {
                    foreach ($category as $cat) {
                        $productDetail = array();
                        $productDetail['ProductID'] = $pid;
                        $productDetail['RefTable'] = 'CP';
                        $productDetail['RefID'] = $cat;
                        $productDetail['Extra'] = '';

                        $productDetail['POS'] = 0;
                        $productDetail['Def'] = '';

                        array_push($productDetailMain, $productDetail);
                    }
                }
            }

            foreach ($request::get('Categories') as $category) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'Categories';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            /*foreach ($request::get('Categories') as $category) {
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
            }*/

            if ((int)$request::get('Opacity') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('Opacity');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('Thickness') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('Thickness');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('ThreadCound') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $pid;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('ThreadCound');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }


            DB::table('ProductDetails')->insert($productDetailMain);

            $return['status'] = true;
            $return['msg'] = 'Product Added.';
            $return['product'] = $pid;

            DB::commit();
            echo json_encode($return);
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $return['msg'] = $this->errorMsg;

                echo json_encode($return);
            } else {
                $return['msg'] = $this->errorMsg;

                echo json_encode($return);
            }

        }


    }

    public function UploadImages(Request $request)
    {
        // GET ALL THE INPUT DATA , $_GET,$_POST,$_FILES.
        $input = Input::all();
        $productID = Input::get('product');
        $file = array_get($input, 'file');
        // SET UPLOAD PATH
        $destinationPath = 'resources/assets/images';
        // GET THE FILE EXTENSION
        $extension = $file->getClientOriginalExtension();
        // RENAME THE UPLOAD WITH RANDOM NUMBER
        $fileName = rand(11111, 99999) . '.' . $extension;
        // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
        $upload_success = $file->move($destinationPath, $fileName);

        $productImage = array();
        $productImage['Dat'] = date('Y-m-d H:i:s');
        $productImage['Title'] = '';
        $productImage['Name'] = $fileName;
        $productImage['RefTable'] = 'Products';
        $productImage['RefID'] = $productID;
        $productImage['POS'] = 0;

        $pid = DB::table('Images')->insertGetId($productImage);
        // IF UPLOAD IS SUCCESSFUL SEND SUCCESS MESSAGE OTHERWISE SEND ERROR MESSAGE
        if ($upload_success) {
            echo json_encode(array(
                'status' => true,
                'msg' => 'Image uploaded successfully. ' . $pid . ''
            ));
        } else {
            echo json_encode(array(
                'status' => false,
                'msg' => 'Image uploaded fail.'
            ));
        }

    }

    public function getProducts()
    {
        try {
            $return = array(
                'status' => false,
                'msg' => 'Fetching.......'
            );

            $products = DB::table('Products as pr')
                ->select('pr.ID', 'pr.Code', 'pr.Name', 'pr.Description', 'pr.Qty', 'pr.Price', 'pr.Dat', 'img.Name as ImgName')
                ->join('Images as img', 'pr.ID', '=', 'img.RefID')
                ->where("pr.ProductTypeID", "=", 6)
                ->where("img.RefTable", "=", 'Products')
                ->groupBy('pr.ID')
                ->orderBy('ID', 'desc')
                ->take(20)
                ->get();

            $return['status'] = true;
            $return['msg'] = 'Received';
            $return['data'] = $products;

            echo json_encode($return);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $return['msg'] = $this->errorMsg;
            } else {
                $return['msg'] = $this->errorMsg;
            }

            echo json_encode($return);
        }
    }

    public function getProductByID($id)
    {
        try {
            $return = array(
                'status' => false,
                'msg' => 'Fetching.......'
            );

            $products = DB::table('Products AS pr')
                ->select('pr.*','pd.RefID as PdRefID','img.ID as imgID','img.RefID as ImgRefID','img.Name as ImgName')
                ->join('Images as img', 'pr.ID', '=', 'img.RefID')
                ->join('ProductDetails AS pd', 'pr.ID', '=', 'pd.ProductID')
                ->where("pr.ProductTypeID", "=", 6)
                ->where("pr.ID", "=", $id)
                ->get();

            $return['status'] = true;
            $return['msg'] = 'Received';
            $return['data'] = $products;

            echo json_encode($return);
        } catch (\Exception $e) {
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $return['msg'] = $this->errorMsg;
            } else {
                $return['msg'] = $this->errorMsg;
            }

            echo json_encode($return);
        }
    }

    public function deleteProduct($id)
    {
        try {

            DB::beginTransaction();
            $deleteStatus = DB::table('Products')->where('ID', '=', $id)->delete();
            DB::table('Images')
                ->where('RefID', '=', $id)
                ->where('RefTable', '=', 'Products')
                ->delete();
            DB::table('ProductDetails')->where('ProductID', '=', $id)->delete();
            DB::commit();

            $data = array(
                'status' => true,
                'msg' => $deleteStatus
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                $data = array(
                    'status' => false,
                    'msg' => $this->errorMsg
                );
            } else {
                $data = array(
                    'status' => false,
                    'msg' => $this->errorMsg
                );
            }

            echo json_encode($data);
        }
    }
}