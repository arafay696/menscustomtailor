<?php
namespace App\Http\Controllers\Admin;

use URL;
use DB;
use Request;
use Redirect;
use Input;
use Session;
use Auth;
use Storage;
use File;

class ProductController extends BaseController
{

    public function deleteImage($id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        // SET UPLOAD PATH
        $destinationPath = 'resources/assets/images';
        try {
            $image = DB::table('images')
                ->select('ID', 'Name')
                ->where("ID", "=", $id)
                ->where("RefTable", "=", "Products")
                ->first();
            if (count($image)) {
                DB::beginTransaction();
                $deleted = DB::table('images')->where('ID', '=', $id)->delete();
                if ($deleted) {
                    File::Delete($destinationPath . '/shirt.jpg');
                }
            }

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
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $categories = DB::table('Categories')
            ->select('ID', 'Name')
            ->where("ProductTypeID", "=", 6)
            ->get();

        $status = DB::table('productstatus')
            ->select('ID', 'Name')
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
            'productType' => $productTypeID,
            'status' => $status
        );

        return view('admin/product/new-product', $data);
    }

    public function addProduct(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

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
        $product['Status'] = $request::get('status');
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


            Session::flash('globalSuccessMsg', 'Product Added.');
            Session::flash('alert-class', 'alert-success');

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

    public function getAllStatus()
    {

        DB::setFetchMode(\Pdo::FETCH_ASSOC);
        $getAllStatus = DB::table('productstatus')
            ->get();
        DB::setFetchMode(\Pdo::FETCH_CLASS);

        /*
        * Set Array key as Status ID
        * Easy to find by ID
        * e.g: $StatusByID[6][0]['Status'] will return Status ID = 6 and
        * Text for this ID
        * */
        foreach ($getAllStatus as $key => $value) {
            $StatusByID[$value['ID']][] = $value;
        }
        return $StatusByID;
    }

    public function editProductView($id)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

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

        $status = DB::table('productstatus')
            ->select('ID', 'Name')
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

        //dd($returnData);
        $selectedCategory = array();
        foreach ($product as $key => $value) {
            if ($value->PdRefTable == 'Categories') {
                if (!in_array($value->PdRefID, $selectedCategory)) {
                    array_push($selectedCategory, $value->PdRefID);
                }
            }
        }

        $relationTables = DB::table('CP')
            ->select('CP.ID', 'CP.MPID', 'MP.ID as MPOID', 'MP.Name')
            ->join('MP', 'CP.MPID', '=', 'MP.ID')
            ->get();

        $Opacity = '';
        $Shine = '';
        $WrinkleResistance = '';
        $Thickness = '';
        $Threadcount = '';
        $Pattern = array();
        $FabricType = array();
        $CustomType = array();
        $ShirtStyle = array();
        $Season = array();
        $SearchColors = array();
        $ContrastColors = array();
        foreach ($product as $key => $value) {
            $oname = $getName = $this->getMPName($relationTables, 'ID', $value->PdRefID);
            if (!empty($oname)) {
                $getName = preg_replace('/\s+/', '', $getName);
                if ($getName == 'Threadcount' || $getName == 'Thickness' || $getName == 'Opacity' || $getName == 'Shine' || $getName == 'WrinkleResistance') {
                    ${$getName} = $value->PdRefID;
                } else {
                    if (is_array(${$getName}) && !in_array($value->PdRefID, ${$getName})) {
                        array_push(${$getName}, $value->PdRefID);
                        /*if($value->PdRefID == 170){
                            $oname = $getName = $this->getMPName($relationTables, 'ID', $value->PdRefID);
                            print_r(${$getName}); exit;
                        }*/
                    } else {
                        ${$getName} = array();
                        array_push(${$getName}, $value->PdRefID);
                    }

                    //echo $oname . ' Value is ' . print_r(${$getName}) . '<br />';
                }

            }

        }

        $selectedStatus = $product[0]->Status;
        $data = array(
            'categories' => $categories,
            'productCategories' => $returnData,
            'product' => $product[0],
            'productDetail' => $product,
            'productID' => $id,
            'selectedCategory' => $selectedCategory,
            'Opacity' => $Opacity,
            'Shine' => $Shine,
            'WrinkleResistance' => $WrinkleResistance,
            'Thickness' => $Thickness,
            'Threadcount' => $Threadcount,
            'Pattern' => $Pattern,
            'FabricType' => $FabricType,
            'CustomType' => $CustomType,
            'ShirtStyle' => $ShirtStyle,
            'Season' => $Season,
            'SearchColors' => $SearchColors,
            'ContrastColors' => $ContrastColors,
            'status' => $status,
            'selectedStatus' => $selectedStatus
        );
        return view('admin/product/edit-product', $data);
    }

    public function editProduct(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

        $product = array();

        $ProductID = $request::get('productID');
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
        $product['Status'] = $request::get('status');

        $productDetailMain = array();
        try {
            DB::beginTransaction();
            DB::table('Products')->where('ID', $ProductID)->update($product);
            DB::table('ProductDetails')->where('ProductID', '=', $ProductID)->delete();
            if ($request::hasFile('picFile')) {
                $files = Input::file('picFile');
                $this->UploadImages($files, $ProductID, 0);
            }

            if ($request::hasFile('zoomImg')) {
                $zoomImg = Input::file('zoomImg');
                $this->UploadImages($zoomImg, $ProductID, 1);
            }
            if ($request::has('Categories')) {
                $array = $request::except('Categories');
            }
            unset($array['picFile']);
            foreach ($array as $category) {
                if (is_array($category) && count($category) > 0) {
                    foreach ($category as $cat) {
                        $productDetail = array();
                        $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
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
                    $productDetail['ProductID'] = $ProductID;
                    $productDetail['RefTable'] = 'CP';
                    $productDetail['RefID'] = (int)$request::get('WrinkleResistance');
                    $productDetail['Extra'] = '';

                    $productDetail['POS'] = 0;
                    $productDetail['Def'] = '';

                    array_push($productDetailMain, $productDetail);
                }
            }


            DB::table('ProductDetails')->insert($productDetailMain);

            DB::commit();

            Session::flash('globalSuccessMsg', 'Product Updated.');
            Session::flash('alert-class', 'alert-success');
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

    public function getMPName($arr, $findCol, $findVal)
    {
        $find = false;
        forEach ($arr as $val) {
            if (!$find) {
                if ($val->$findCol == $findVal) {
                    $find = true;
                    return $val->Name;
                }
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

    public function getProductList()
    {
        try {
            $users = DB::table('products')
                ->select('ID', 'Code', 'Price')
                ->get();

            $data = array(
                'status' => true,
                'products' => $users
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            $data = array(
                'status' => false
            );

            echo json_encode($data);
        }
    }


    public function getProducts()
    {
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }
        try {

            $products = DB::table('Products as pr')
                ->select('pr.ID', 'pr.Status', 'pr.Code', 'pr.Name', 'pr.Description', 'pr.Qty', 'pr.Price', 'pr.Dat', 'img.Name as ImgName')
                ->join('Images as img', 'pr.ID', '=', 'img.RefID')
                ->where("pr.ProductTypeID", "=", 6)
                ->where("img.RefTable", "=", 'Products')
                ->groupBy('pr.ID')
                ->orderBy('ID', 'desc')
                ->get();

            $statusByID = $this->getAllStatus();
            $data = array(
                'products' => $products,
                'statusByID' => $statusByID
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
        if (!Auth::check()) {
            return Redirect::to('admin/auth/login');
        }

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