<?php
/**
 * Created by PhpStorm.
 * User: Abdul Rafay
 * Date: 7/24/2016
 * Time: 7:18 PM
 */

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;


class BaseController extends Controller {

    public $errorMsg;

    public function __construct(){

        $this->errorMsg = 'Whoops! There were some problems with your input.';
    }
}