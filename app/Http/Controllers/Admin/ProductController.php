<?php
namespace App\Http\Controllers\Admin;

use URL;
use DB;
use Request;
use Redirect;
use Input;
use Session;

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

    public function addProductView($productTypeID)
    {
        $categories = DB::table('Categories')
            ->select('ID', 'Name')
            ->where("ProductTypeID", "=", 6)
            ->get();

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

        $data = array(
            'categories' => $categories,
            'productCategories' => $returnData,
            'productType' => $productTypeID
        );

        return view('admin/product/new-product', $data);
    }

    public function addProduct(Request $request)
    {

        //dd($array);
        $product = array();

        $product['ProductTypeID'] = $request::get('ProductTypeID');
        $product['MerchantID'] = Session::get('userID');
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

            if ($request::hasFile('picFile')) {
                $files = Input::file('picFile');
                $this->UploadImages($files, $pid, 0);
            }

            if ($request::hasFile('zoomImg')) {
                $zoomImg = Input::file('zoomImg');
                $this->UploadImages($zoomImg, $pid, 1);
            }
            if ($request::has('Categories')) {
                $array = $request::except('Categories');
            }
            unset($array['picFile']);
            foreach ($array as $category) {
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

            if ($request::has('Categories')) {
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
            if ($request::has('Opacity')) {
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
            }

            if ($request::has('Thickness')) {
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
            }

            if ($request::has('Threadcount')) {
                if ((int)$request::get('Threadcount') != 0) {
                    $productDetail = array();
                    $productDetail['ProductID'] = $pid;
                    $productDetail['RefTable'] = 'CP';
                    $productDetail['RefID'] = (int)$request::get('Threadcount');
                    $productDetail['Extra'] = '';

                    $productDetail['POS'] = 0;
                    $productDetail['Def'] = '';

                    array_push($productDetailMain, $productDetail);
                }
            }

            if ($request::has('Shine')) {
                if ((int)$request::get('Shine') != 0) {
                    $productDetail = array();
                    $productDetail['ProductID'] = $pid;
                    $productDetail['RefTable'] = 'CP';
                    $productDetail['RefID'] = (int)$request::get('Shine');
                    $productDetail['Extra'] = '';

                    $productDetail['POS'] = 0;
                    $productDetail['Def'] = '';

                    array_push($productDetailMain, $productDetail);
                }
            }

            if ($request::has('WrinkleResistance')) {
                if ((int)$request::get('WrinkleResistance') != 0) {
                    $productDetail = array();
                    $productDetail['ProductID'] = $pid;
                    $productDetail['RefTable'] = 'CP';
                    $productDetail['RefID'] = (int)$request::get('WrinkleResistance');
                    $productDetail['Extra'] = '';

                    $productDetail['POS'] = 0;
                    $productDetail['Def'] = '';

                    array_push($productDetailMain, $productDetail);
                }
            }


            DB::table('ProductDetails')->insert($productDetailMain);


            $return['status'] = true;
            $return['msg'] = 'Product Added.';
            $return['product'] = $pid;

            DB::commit();

            return Redirect::to('admin/product/products');
        } catch (\Exception $e) {
            DB::rollback();
            $error = $e->getMessage();
            if (env('Mode') == 'Development') {
                $this->errorMsg = $error;
                Session::flash('globalErrMsg', $this->errorMsg);
                Session::flash('alert-class', 'alert-danger');
            } else {
                Session::flash('globalErrMsg', $this->errorMsg);
                Session::flash('alert-class', 'alert-danger');
            }
            return redirect()->back()->withInput();

        }


    }

    public function editProductView($id)
    {
        if (empty($id)) {
            Session::flash('globalErrMsg', 'Product Not Found');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('admin/product/products');
        }

        $product = DB::table('Products AS pr')
            ->select('pr.*', 'pd.RefID as PdRefID', 'pd.RefTable as PdRefTable', 'img.ID as imgID', 'img.RefID as ImgRefID', 'img.Name as ImgName')
            ->join('Images as img', 'pr.ID', '=', 'img.RefID')
            ->join('ProductDetails AS pd', 'pr.ID', '=', 'pd.ProductID')
            ->where("pr.ProductTypeID", "=", 6)
            ->where("pr.ID", "=", $id)
            ->get();

        if (empty($product) || count($product) <= 0) {
            Session::flash('globalErrMsg', 'Product Not Found');
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('admin/product/products');
        }

        $categories = DB::table('Categories')
            ->select('ID', 'Name')
            ->where("ProductTypeID", "=", 6)
            ->get();

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
        $selectedCategory = array();
        foreach ($product as $key => $value) {
            if ($value->PdRefTable == 'Categories') {
                if (!in_array($value->PdRefID, $selectedCategory)) {
                    array_push($selectedCategory, $value->PdRefID);
                }
            }
        }

        //dd($product);
        $data = array(
            'categories' => $categories,
            'productCategories' => $returnData,
            'product' => $product[0],
            'productDetail' => $product,
            'productID' => $id,
            'selectedCategory' => $selectedCategory
        );

        return view('admin/product/edit-product', $data);
    }

    public function editProduct($id, Request $request)
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

        $product['Pos'] = $request::get('Pos');
        $product['Status'] = $request::get('Status');
        $product['MRID'] = $request::get('MRID');
        $product['MRProductID'] = $request::get('MRProductID');

        $product['Linked'] = $request::get('Linked');

        $productDetailMain = array();

        try {
            DB::beginTransaction();
            DB::table('ProductDetails')->where('ProductID', '=', $id)->delete();
            DB::table('Products')->where('ID', $id)->update($product);

            foreach ($request::except('Categories') as $category) {
                if (is_array($category) && count($category) > 0) {
                    foreach ($category as $cat) {
                        $productDetail = array();
                        $productDetail['ProductID'] = $id;
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
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'Categories';
                $productDetail['RefID'] = $category;
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('Opacity') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('Opacity');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('Thickness') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('Thickness');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('Threadcount') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = $request::get('Threadcount');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('Shine') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('Shine');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }

            if ((int)$request::get('WrinkleResistance') != 0) {
                $productDetail = array();
                $productDetail['ProductID'] = $id;
                $productDetail['RefTable'] = 'CP';
                $productDetail['RefID'] = (int)$request::get('WrinkleResistance');
                $productDetail['Extra'] = '';

                $productDetail['POS'] = 0;
                $productDetail['Def'] = '';

                array_push($productDetailMain, $productDetail);
            }


            DB::table('ProductDetails')->insert($productDetailMain);

            $return['status'] = true;
            $return['msg'] = 'Product Updated.';
            $return['product'] = $id;

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

    public function UploadImages($files, $productID, $zoom)
    {
        // SET UPLOAD PATH
        $destinationPath = 'resources/assets/images';

        if (is_array($files)) {
            $file_count = count($files);
            $uploadcount = 0;
            foreach ($files as $file) {

                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);
                $uploadcount++;

                $productImage = array();
                $productImage['Dat'] = date('Y-m-d H:i:s');
                $productImage['Title'] = '';
                $productImage['Name'] = $fileName;
                $productImage['RefTable'] = 'Products';
                $productImage['RefID'] = $productID;
                $productImage['POS'] = 0;
                $productImage['ZoomImg'] = $zoom;

                DB::table('Images')->insertGetId($productImage);
            }
        } else {

            $file = $files;
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
            $productImage['ZoomImg'] = $zoom;

            DB::table('Images')->insertGetId($productImage);

        }

    }

    public function getProducts()
    {
        try {

            $products = DB::table('Products as pr')
                ->select('pr.ID', 'pr.Code', 'pr.Name', 'pr.Description', 'pr.Qty', 'pr.Price', 'pr.Dat', 'img.Name as ImgName')
                ->join('Images as img', 'pr.ID', '=', 'img.RefID')
                ->where("pr.ProductTypeID", "=", 6)
                ->where("img.RefTable", "=", 'Products')
                ->groupBy('pr.ID')
                ->orderBy('ID', 'desc')
                ->take(20)
                ->get();

            $data = array(
                'products' => $products
            );
            return view('admin/product/productListing', $data);
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

    public function getProductByID($id)
    {
        try {
            $return = array(
                'status' => false,
                'msg' => 'Fetching.......'
            );

            $products = DB::table('Products AS pr')
                ->select('pr.*', 'pd.RefID as PdRefID', 'pd.RefTable as PdRefTable', 'img.ID as imgID', 'img.RefID as ImgRefID', 'img.Name as ImgName')
                ->join('Images as img', 'pr.ID', '=', 'img.RefID')
                ->join('ProductDetails AS pd', 'pr.ID', '=', 'pd.ProductID')
                ->where("pr.ProductTypeID", "=", 6)
                ->where("pr.ID", "=", $id)
                ->get();

            $relationTables = DB::table('CP')
                ->select('CP.ID', 'CP.MPID', 'MP.ID as MPOID', 'MP.Name')
                ->join('MP', 'CP.MPID', '=', 'MP.ID')
                ->get();

            $return['status'] = true;
            $return['msg'] = 'Received';
            $return['data'] = $products;
            $return['relation'] = $relationTables;

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
            DB::table('Products')->where('ID', '=', $id)->delete();
            DB::table('Images')
                ->where('RefID', '=', $id)
                ->where('RefTable', '=', 'Products')
                ->delete();
            DB::table('ProductDetails')->where('ProductID', '=', $id)->delete();
            DB::commit();

            Session::flash('globalSuccessMsg', 'Product Deleted.');
            Session::flash('alert-class', 'alert-success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
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