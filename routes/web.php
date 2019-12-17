<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('home', function (){
//     return view('home');
// });


Route::get('/', 'HomeController@index')->name('/');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');






Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {

     Route::resource('category','CategoriesController');

     Route::get('dashboard','AdminController@dashboard');

     Route::post('category','CategoriesController@createCategory')->name('create-category');

     Route::get('categories','CategoriesController@displayallCategories')->name('categories');

     Route::get('/editcat/{id}','CategoriesController@editCat')->name('editcat');

      Route::post('/updatecat/{id}','CategoriesController@updateCat')->name('updatecat');


      Route::get('/deletecat/{id}','CategoriesController@deletecat')->name('deletecat');


      Route::resource('products','ProductsController');

      Route::get('/createproduct','ProductsController@createproduct')->name('createproduct');



       Route::post('storeproduct','ProductsController@storeproduct')->name('storeproduct');


       Route::get('products','ProductsController@displayallProducts');

       Route::get('productedit/{id}','ProductsController@productedit');


       Route::post('/updatepro/{id}','ProductsController@updatepro')->name('updatepro');



       Route::get('/deletepro/{id}','ProductsController@deletePro');


       Route::get('/attributes/{id}','ProductsController@attributes')->name('attributes');


        Route::post('storeattribute/{id}','ProductsController@storeattribute')->name('storeattribute');


        Route::get('/delattribute/{id}','ProductsController@delattribute')->name('delattribute');


        Route::get('/deleteprodimg/{id}','ProductsController@deleteprodimg');
        
        Route::get('/addmoreimages/{id}','ProductsController@addmoreimages')->name('addmoreimages');

        Route::post('/storemoreimages/{id}','ProductsController@storemoreimages')->name('storeimages');

        Route::get('/deladdimage/{id}','ProductsController@deladdimage')->name('deladdimage');

        Route::post('/editattr/{id}','ProductsController@editattr');



        Route::get('/attachcoupon','CouponsController@attachcoupon');

        Route::post('/storecoupon','CouponsController@storecoupon');

        Route::get('/coupons','CouponsController@coupons');


        Route::get('couponedit/{id}','CouponsController@couponedit');

        Route::post('/couponeupdate/{id}','CouponsController@couponeupdate')->name('couponeupdate');

        Route::get('/coupdel/{id}','CouponsController@coupdel');



});




Route::get('/products/{url}','ProductsController@products');



Route::get('/product/{id}','ProductsController@productdetail');

Route::get('/select-priceof-product','ProductsController@selectpriceofproduct');


Route::post('/tocart', 'ProductsController@tocart');



Route::get('/cartindex','ProductsController@cartindex');



Route::match(['get', 'post'],'/cart','ProductsController@cart');


Route::get('/deleteproductfromcart/{id}','ProductsController@deleteproductfromcart');


Route::get('/updatyquantityofcart/{id}/{quantity}','ProductsController@updatyquantityofcart');




Route::post('/cart/usecoupon','ProductsController@usecoupon');


Route::get('/loginuser','ClientsController@register');


Route::post('/loginstore','ClientsController@loginstore');



 Route::post('/clientlogin', 'ClientsController@clientlogin');



Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


 Route::group(['middleware'=>['loginfront']],function(){


 Route::get('/clientaccount','ClientsController@clientaccount');

 Route::post('/clientupdate', 'ClientsController@clientupdate');


 Route::get('/checkout','ClientsController@checkout');


 Route::post('/invoicestore', 'ClientsController@invoicestore');


 Route::get('/orderrevision', 'ClientsController@orderrevision');


 Route::get('paypalrich','ClientsController@paypalrich')->name('paypalrich');
});




Route::get('paypalpayment','ClientsController@paypalpayment')->name('paypalpayment');




























