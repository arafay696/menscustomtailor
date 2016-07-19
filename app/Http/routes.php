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


Route::get('admin', 'Admin\UserController@index');
//,'middleware' => ['auth']
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace

    Route::get('/home', 'UserController@index');
});


