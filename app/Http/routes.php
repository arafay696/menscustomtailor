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
Route::get('/test', 'Client\UserController@tt');
Route::get('/fabric', 'Client\FabricController@index');
Route::get('/fabric/{id}', 'Client\FabricController@customizebyID');
Route::match(['get', 'post'], '/fabric/customize/new', 'Client\FabricController@customize');
Route::post('/fabric/customize', 'Client\FabricController@setCustomizeValues');
Route::get('/cart', 'Client\CartController@index');
Route::get('cart/remove/{key}', 'Client\CartController@RemoveItem');
Route::post('cart/save', 'Client\CartController@SaveData');
Route::post('cart/update', 'Client\CartController@UpdateData');
Route::get('checkout', 'Client\CartController@checkout');
Route::post('loadsize/magic', 'Client\FabricController@LoadSizeMagic');
Route::post('verifyDiscountCoupon', 'Client\CartController@verifyDiscountCoupon');
Route::post('verifyGiftCoupon', 'Client\CartController@verifyGiftCoupon');

Route::get('contact-us', 'Client\HomeController@contactus');
Route::get('about-us', 'Client\HomeController@aboutus');

Route::get('faqs', 'Client\HomeController@faqs');

//  User Routes
Route::get('/login', 'Client\UserController@index');
Route::get('/logout', 'Client\UserController@logout');
Route::get('profile', 'Client\UserController@profile');
Route::get('newsletter', 'Client\UserController@newsletter');
Route::get('change-password', 'Client\UserController@changePassword');
Route::post('doLogin', 'Client\UserController@doLogin');
Route::post('doRegister', 'Client\UserController@addUser');
Route::post('doEditUser', 'Client\UserController@updateuser');
Route::post('changePassword', 'Client\UserController@updatepassword');
Route::get('order-history', 'Client\UserController@orderHistory');
Route::get('order/detail/{id}', 'Client\UserController@orderDetail');
Route::get('measurements', 'Client\UserController@myMeasurements');
Route::get('generate-invoice/{id}', 'Client\UserController@generateInvoice');
Route::get('generate-pdf/{id}', 'Client\UserController@generateInvoicePlz');
Route::post('edit-size', 'Client\UserController@myMeasurementsEdit');
Route::post('contact-us', 'Client\UserController@contactUs');


/*------------- Save To PDF */
Route::get('pdf', 'Client\UserController@saveToPDF');

//-------------- Cart
Route::post('payment', array(
    'as' => 'payment',
    'uses' => 'Client\PayPalController@postPayment',
));

Route::post('finish', 'Client\PayPalController@finish');


// this is after make the payment, PayPal redirect back to your site
Route::get('payment/status', array(
    'as' => 'payment.status',
    'uses' => 'Client\PayPalController@getPaymentStatus',
));

//-------------- Gift Card
Route::post('gift/payment', array(
    'as' => 'payment',
    'uses' => 'Client\PayPalController@postGiftPayment',
));

// this is after make the Gift Card payment, PayPal redirect back to your site
Route::get('gift/payment/status', array(
    'as' => 'gift.status',
    'uses' => 'Client\PayPalController@getGiftPaymentStatus',
));

Route::get('gift-card', 'Client\HomeController@giftCard');
Route::post('save/image', 'Client\HomeController@saveImage');

Route::get('test-pdf', 'Client\HomeController@testPdf');
/*
* -------------------- Admin Routes -------------------
 * */
Route::get('admin', 'Admin\UserController@index');
Route::get('admin/auth/login', 'Admin\UserController@index');
Route::post('admin/auth', 'Admin\UserController@doLogin');
Route::get('admin', 'Admin\UserController@home');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    // ----------- Product Routes
    Route::get('/home', 'UserController@home');
    Route::get('/products', 'ProductController@getProductList');
    Route::get('/product/getSettings', 'ProductController@getProductCategories');
    Route::get('/product/new/{id}', 'ProductController@addProductView');
    Route::post('/product/add-product', 'ProductController@addProduct');
    Route::post('/product/addImages', 'ProductController@UploadImages');
    Route::get('/product/products', 'ProductController@getProducts');
    Route::get('/product/delete/{id}', 'ProductController@deleteProduct');
    Route::get('/product/product/{id}', 'ProductController@getProductByID');
    Route::get('/product/edit/{id}', 'ProductController@editProductView');
    Route::post('/product/edit-product', 'ProductController@editProduct');
    Route::get('/delete/image/{id}', 'ProductController@deleteImage');

    // ---------------- Orders
    Route::get('/gift-orders', 'OrderController@giftOrders');
    Route::get('/orders', 'OrderController@orders');
    Route::get('/orderList', 'OrderController@orders');
    Route::get('/order/{orderID}/{customerID}', 'OrderController@orderDetail');
    Route::get('/order/new', 'OrderController@newOrderView');
    Route::get('/customer/size/{id}', 'OrderController@getSizeByCID');
    Route::post('/order/save', 'OrderController@saveSizeAndOrder');
    Route::post('/order/style/save', 'OrderController@saveStyle');
    Route::post('/order/editSize', 'OrderController@myMeasurementsEdit');
    Route::get('/style/edit/{id}/{orderID}/{customerID}', 'OrderController@editStyle');
    Route::post('/shirt/edit', 'OrderController@editStylePost');

    // -------------------- Discount Code
    Route::get('/discount/generate', 'OrderController@addDiscountView');
    Route::post('/discount/generateIt', 'OrderController@generateDiscount');
    Route::get('/discount/list', 'OrderController@getDiscountList');
    Route::get('/discount/{status}/{id}', 'OrderController@changeStatusDiscount');

    //-------------- Customer Router admin
    Route::get('/customer/add', 'UserController@addCustomerView');
    Route::post('/customer/new', 'UserController@addCustomer');
    Route::get('/customer/customers', 'UserController@getCustomersList');

    // ----------- User Routes
    Route::get('/customers', 'UserController@getCustomers');
    Route::get('/user/add', 'UserController@addUserView');
    Route::post('/user/add-user', 'UserController@addUser');
    Route::get('/user/users', 'UserController@getUsers');
    Route::get('/user/get-types', 'UserController@getAllTypes');
    Route::get('/user/checkUserLogin', 'UserController@checkUserLogin');
    Route::get('/user/delete/{id}', 'UserController@deleteUser');
    Route::get('/users/user/{id}', 'UserController@getUser');
    Route::get('/user/edit/{id}', 'UserController@editUserView');
    Route::post('/user/edit-user/{id}', 'UserController@editUser');
    Route::post('/userprofile/profilepasswordupdate', 'UserController@updatepassword');
    Route::post('/userprofile/update', 'UserController@updateuser');

    Route::get('/logout', 'UserController@logout');
});

	