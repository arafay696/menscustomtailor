<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


/*
 * -------------------- Admin Routes -------------------
 * */

Route::get('admin/auth/login', 'Admin\UserController@index');
Route::post('admin/auth', 'Admin\UserController@doLogin');
Route::get('admin', 'Admin\UserController@home');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {


    Route::get('/home', 'UserController@home');
    Route::get('/product/getSettings', 'ProductController@getProductCategories');
    Route::post('/product/add-product', 'ProductController@addProduct');
    Route::post('/product/addImages', 'ProductController@UploadImages');
    Route::get('/product/getProducts', 'ProductController@getProducts');

    Route::get('/logout', 'UserController@logout');
});


