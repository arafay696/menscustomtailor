<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/24/2016
 * Time: 7:18 PM
 */

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use View;

class BaseController extends Controller
{

    use CommonFunction;
    public $errorMsg;

    public function __construct()
    {
        $this->errorMsg = 'Whoops! There were some problems with your input.';
        $itemSelected = $this->getCartData();
        $ShareData = array(
            'itemSelected' => $itemSelected
        );
        View::share('ShareData', $ShareData);
    }
}