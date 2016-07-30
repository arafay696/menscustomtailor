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


/*
* -------------------- Client Routes -------------------
 * */
Route::get('/', 'Client\HomeController@index');

//  Fabric Routes
Route::get('/fabric', 'Client\FabricController@index');
Route::get('/fabric/{id}', 'Client\FabricController@customize');

//  User Routes
Route::get('/login', 'Client\UserController@index');


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
    Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
    Route::get('/product/product/{id}', 'ProductController@getProductByID');
    Route::post('/product/edit/{id}', 'ProductController@editProduct');

    Route::post('/user/add-user', 'UserController@addUser');
    Route::get('/user/getUsers/{id}', 'UserController@getUsers');
    Route::get('/user/get-types', 'UserController@getAllTypes');
    Route::get('/user/checkUserLogin', 'UserController@checkUserLogin');
    Route::get('/user/delete/{id}', 'UserController@deleteUser');
    Route::get('/users/user/{id}', 'UserController@getUser');
    Route::post('/user/edit/{id}', 'UserController@editUser');

    Route::get('/logout', 'UserController@logout');
});


