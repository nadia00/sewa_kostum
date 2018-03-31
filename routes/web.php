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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/jasa')->group(function(){
    Route::get('/register', 'Auth\RegisterUserController@showJasa');
    Route::post('/register', 'Auth\RegisterUserController@registerJasa')->name('register.jasa.submit');
    
    Route::get('/login', 'Auth\LoginUserController@showJasa');
    Route::post('/login', 'Auth\LoginUserController@loginJasa')->name('login.jasa.submit');
    
    Route::get('/', 'ProfilController@showJasa');
});

Route::prefix('/penyewa')->group(function(){
    Route::get('/register', 'Auth\RegisterUserController@showPenyewa');
    Route::post('/register', 'Auth\RegisterUserController@registerPenyewa')->name('register.penyewa.submit');
    
    Route::get('/login', 'Auth\LoginUserController@showPenyewa');
    Route::post('/login', 'Auth\LoginUserController@loginPenyewa')->name('login.penyewa.submit');
    
    Route::get('/', 'ProfilController@showPenyewa');
});


//Auth::roregisterJasautes();

Route::get('/home', 'HomeController@index');
