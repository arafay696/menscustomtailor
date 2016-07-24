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
                ->select('MP.Name', 'MP.Type', 'CP.Name')
                ->where("MP.ProductTypeID", "=", 6)
                ->get();
            $data = array(
                'categories' => $productCategories
            );

            echo json_encode($data);
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }

}