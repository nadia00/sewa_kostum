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
Route::get('/category/{id}', 'HomeController@productCategory')->name('product.category');
Route::get('/products/{page?}', 'HomeController@allProduct')->name('product.all');
Route::get('detail/{id}', 'ProductsController@detail')->name('product-detail');

Route::prefix('admin-shop')->group(function(){
    Route::get('profile', 'AdminShop\ShopsController@profile')->name('admin-shop.profile');

    Route::get('order', 'AdminShop\OrdersController@index')->name('admin-shop.order');
    Route::get('order/refresh', 'AdminShop\OrdersController@refresh')->name('admin-shop.refresh-order');

    Route::get('product', 'AdminShop\ProductsController@index')->name('admin-shop.product');

    Route::get('delete-product/{id}', 'AdminShop\ProductsController@deleteProduct')->name('delete-product');

    Route::get('add-product', 'AdminShop\ProductsController@addIndex')->name('admin-shop.add-product');
    Route::post('add-product', 'AdminShop\ProductsController@addCreate')->name('admin-shop.add-product');

    Route::get('edit-product/{id}', 'AdminShop\ProductsController@editIndex')->name('admin-shop.edit-product');
    Route::post('edit-product', 'AdminShop\ProductsController@editIndex')->name('admin-shop.edit-product');
});

Route::get('product/stock/{id}','ProductsController@stok')->name('user.product-stock');

Route::prefix('user')->group(function(){
    Route::get('/', 'UserController@index')->name('user');
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

});





//Route::prefix('/admin')->group(function(){
//    Route::get('/', 'HomeController@index');
//    Route::get('/kategori', 'AdminController@showKategori')->name('admin.kategori');
//    Route::get('/add-kategori', 'AdminController@addKategori');
//    Route::get('/update-kategori', 'AdminController@updateKategori')->name('admin.kategori-edit');
//    Route::get('/delete-kategori', 'AdminController@deleteKategori')->name('admin.kategori-delete');
//});


//nyobak
Route::get('/nyobak',function(){
    return view('nyobak');
});