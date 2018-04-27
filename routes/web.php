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
    Route::post('/myshop-create','ShopController@createShop')->name('shop.create');
    Route::get('/myshop-delete','ShopController@deleteCostume')->name('shop.delete');
    Route::post('/myshop-add','ShopController@addCostume')->name('shop.add');
    Route::get('/detail/{id}', 'ShopController@getDetailCostume')->name('detail.kostum');
    Route::post('/transaction', 'TransactionController@addTransaction')->name('user.transaction');
    Route::get('/myshop-order-list', 'TransactionController@getOrder');
    Route::get('/myshop-order-detail/{id}', 'TransactionController@getDetailOrder');
});

// nggak Dipake
Route::prefix('/penyewa')->group(function(){
    Route::get('/register', 'Auth\RegisterUserController@showPenyewa');
    Route::post('/postregister', 'Auth\RegisterUserController@registerPenyewa')->name('register.penyewa.submit');

    Route::get('/login', 'Auth\LoginUserController@showPenyewa');
    Route::post('/login', 'Auth\LoginUserController@loginPenyewa')->name('login.penyewa.submit');
    Route::get('/tambah-kostum', 'KostumController@showTambahKostum')->name('tambah.kostum');
    Route::post('/tambah-kostum', 'KostumController@uploadKostum')->name('kostum.submit');
    Route::get('/kostum', 'KostumController@showKostumJasa');
    Route::get('/detail/{id}', 'KostumController@showDetail');
    Route::get('/edit-kostum', 'KostumController@showEditKostum');
    Route::post('/edit-kostum', 'KostumController@editKostum')->name('edit.kostum.submit');


    Route::get('/', 'ProfilController@showPenyewa');
    Route::get('/home', 'KostumController@tampilAll');
});


//nyobak
Route::get('/nyobak',function(){
    return view('nyobak');
});