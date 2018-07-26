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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/category/{id}/{page?}/{show?}', 'HomeController@productCategory')->name('product.category');
Route::get('/products/{page?}/{show?}', 'HomeController@allProduct')->name('product.all');
Route::get('detail/{id}', 'ProductsController@detail')->name('product-detail');

Route::prefix('admin-shop')->group(function(){
    Route::get('profile', 'AdminShop\ShopsController@profile')->name('admin-shop.profile');

    Route::get('edit','UserController@edit')->name('admin-shop.edit');
    Route::post('edit','UserController@editProfile')->name('admin-shop.edit-profile');

    Route::post('count','AdminShop\FineController@insertCount')->name('admin-shop.insert-count');

    Route::get('product', 'AdminShop\ProductsController@index')->name('admin-shop.product');

    Route::get('add-product', 'AdminShop\ProductsController@addIndex')->name('admin-shop.add-product');
    Route::post('add-product', 'AdminShop\ProductsController@addCreate')->name('admin-shop.add-product');

    Route::get('edit-product/{id}', 'AdminShop\ProductsController@editIndex')->name('admin-shop.edit-product');
    Route::post('edit-product', 'AdminShop\ProductsController@editCreate')->name('admin-shop.post-product');
    Route::post('delete-image/{id}', 'AdminShop\ProductsController@deleteImage')->name('admin-shop.del-image');
    Route::post('add-image','AdminShop\ProductsController@addImage')->name('admin-shop.add.image');

    Route::get('delete-product/{id}', 'AdminShop\ProductsController@deleteProduct')->name('delete-product');

    Route::get('order', 'AdminShop\OrdersController@index')->name('admin-shop.order');
    Route::get('order/refresh', 'AdminShop\OrdersController@refresh')->name('admin-shop.refresh-order');

    Route::get('cek', 'AdminShop\FineController@cek')->name('admin-shop.cek');
    Route::get('add-fine', 'AdminShop\FineController@index')->name('admin-shop.fine-form');
    Route::post('add-fine','AdminShop\FineController@insert')->name('admin-shop.insert-fine');
    Route::get('fine','AdminShop\FineController@editIndex')->name('admin-shop.fine');
    Route::post('fine','AdminShop\FineController@edit')->name('admin-shop.fine-edit');

    Route::get('return/{shop_id}','AdminShop\ReturnController@getDenda')->name('return-show');

    Route::post('done','AdminShop\ReturnController@done')->name('admin-shop.done');
    Route::post('kembali','AdminShop\ReturnController@kembali')->name('admin-shop.kembali');
});

Route::prefix('user')->group(function(){
    Route::get('/', 'UserController@index')->name('user');

    Route::get('edit','UserController@edit')->name('user.edit');
    Route::post('edit','UserController@editProfile')->name('user.edit-profile');

    Route::post("add-address","UserController@address")->name("user.address");

    Route::get('create-shop', 'AdminShop\ShopsController@create')->name('user.create-shop');
    Route::post('create-shop', 'AdminShop\ShopsController@store')->name('user.create-shop');

    Route::post('/cart/store', 'CartController@store')->name('user.cart-store');
    Route::get('/cart/destroy', 'CartController@destroy')->name('user.cart-clear');
    Route::get('/cart/total', 'CartController@size')->name('user.cart-size');
    Route::get('/cart/show', 'CartController@show')->name('user.cart-show');
    Route::get('/order/show', 'CartController@showOrder')->name('user.cart-order');
    Route::get('/cart/delete/{rowId}', 'CartController@delete')->name('user.cart-delete');

    Route::get('/order', 'OrdersController@method')->name('user.order-method');
    Route::post('/order', 'OrdersController@store')->name('user.order');

    Route::get('order-list', 'OrdersController@list')->name('user.order-list');
    Route::get('order/refresh','OrdersController@refresh')->name('user.refresh-order');

    Route::get('payment', 'PaymentController@index')->name('user.payment');
});

Route::post('storereview', 'ProductReviewController@store')->name('review.store');





//Route::prefix('/admin')->group(function(){
//    Route::get('/', 'HomeController@index');
//    Route::get('/kategori', 'AdminController@showKategori')->name('admin.kategori');
//    Route::get('/add-kategori', 'AdminController@addKategori');
//    Route::get('/update-kategori', 'AdminController@updateKategori')->name('admin.kategori-edit');
//    Route::get('/delete-kategori', 'AdminController@deleteKategori')->name('admin.kategori-delete');
//});
