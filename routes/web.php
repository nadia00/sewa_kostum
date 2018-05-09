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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/user')->group(function(){
    Route::get('/', 'HomeController@index');
    Route::get('/myshop','ShopController@index')->name('user.shop');

    //membuat toko
    Route::post('/myshop-create','ShopController@createShop')->name('shop.create');

    Route::get('/myshop-delete','ShopController@deleteCostume')->name('shop.delete');
    Route::post('/myshop-add','ShopController@addCostume')->name('shop.add');
    Route::get('/detail/{id}', 'ShopController@getDetailCostume')->name('detail.kostum');
    
    Route::post('/transaction', 'TransactionController@addTransaction')->name('user.transaction');
    Route::get('/myshop-order-list', 'TransactionController@getOrder');
    Route::get('/myshop-order-detail/{id}', 'TransactionController@getDetailOrder');
    Route::post('terimaOrder', 'TransactionController@terimaOrder')->name('terimaOrder');
    Route::post('tolakOrder', 'TransactionController@tolakOrder')->name('tolakOrder');


});

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