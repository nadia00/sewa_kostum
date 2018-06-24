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

Route::prefix('admin-shop')->group(function(){
    Route::get('', 'AdminShop\ProductsController@index');

    Route::get('profile', 'AdminShop\ShopsController@profile')->name('admin-shop.profile');

    Route::get('order', 'AdminShop\OrdersController@index')->name('admin-shop.order');
    Route::get('order/refresh', 'AdminShop\OrdersController@refresh')->name('admin-shop.refresh-order');

    Route::get('product', 'AdminShop\ProductsController@index')->name('admin-shop.product');

    Route::get('add-product', 'AdminShop\ProductsController@addIndex')->name('admin-shop.add-product');
    Route::post('add-product', 'AdminShop\ProductsController@addCreate')->name('admin-shop.add-product');

    Route::get('edit-product/{id}', 'AdminShop\ProductsController@editIndex')->name('admin-shop.edit-product');
    Route::post('edit-product', 'AdminShop\ProductsController@editIndex')->name('admin-shop.edit-product');
});

Route::prefix('user')->group(function(){
    Route::get('/', 'UserController@index')->name('user');

    Route::post("add-address","UserController@address")->name("user.address");

    Route::get('create-shop', 'AdminShop\ShopsController@create')->name('user.create-shop');
    Route::post('create-shop', 'AdminShop\ShopsController@store')->name('user.create-shop');

    Route::get('detail/{id}', 'ProductsController@detail')->name('user.product-detail');

    Route::post('/cart/store', 'CartController@store')->name('user.cart-store');
    Route::get('/cart/destroy', 'CartController@destroy')->name('user.cart-clear');
    Route::get('/cart/total', 'CartController@size')->name('user.cart-size');
    Route::get('/cart/show', 'CartController@show')->name('user.cart-show');
    Route::get('/order/show', 'CartController@showOrder')->name('user.cart-order');
    Route::get('/cart/delete/{rowId}', 'CartController@delete')->name('user.cart-delete');

    Route::get('/order', 'OrdersController@method')->name('user.order-method');
    Route::post('/order', 'OrdersController@store')->name('user.order');

//    Route::get('myshop-order', 'TransactionController@getOrder')->name('order.get');
//    Route::get('myshop-order-terima', 'TransactionController@getOrderTerima')->name('order.terima');
//    Route::get('myshop-order-tolak', 'TransactionController@getOrderTolak')->name('order.tolak');

//    Route::post('myshop-terimaOrder', 'TransactionController@terimaOrder')->name('terima.order');
//    Route::post('myshop-tolakOrder', 'TransactionController@tolakOrder')->name('tolak.order');

//    Route::get('order', 'UserController@getOrder')->name('order.user.get');
//    Route::get('order-terima', 'UserController@getOrderTerima');
//    Route::get('order-tolak', 'UserController@getOrderTolak');
});


Route::get('kostum', 'ShopController@getMyCostumes')->name('kostum.get');
Route::get('kostum-add', 'ShopController@addCostumeShow');
Route::post('kostum-tambah', 'ShopController@addCostume')->name('kostum.add');

Route::get('detail-add/{id}', 'ShopController@costumeDetail')->name('kostum.size');
Route::post('detail-add', 'ShopController@addDetailCostume')->name('detail.add');

//    Route::get('kostum-update', 'ShopController@updateCostume')->name('kostum.update');
Route::get('kostum-del/{id}', 'ShopController@deleteCostume')->name('kostum.del');
Route::get('detail/{id}', 'ShopController@getDetailCostume')->name('kostum.detail');
Route::get('detail-data/{ukuran}/{kostum}', 'ShopController@getDetailHarga')->name('kostum.detail');


Route::prefix('/admin')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/kategori', 'AdminController@showKategori')->name('admin.kategori');
    Route::get('/add-kategori', 'AdminController@addKategori');
    Route::get('/update-kategori', 'AdminController@updateKategori')->name('admin.kategori-edit');
    Route::get('/delete-kategori', 'AdminController@deleteKategori')->name('admin.kategori-delete');
});


//nyobak
Route::get('/nyobak',function(){
    return view('nyobak');
});