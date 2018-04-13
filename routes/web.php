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

Route::get('/login-baru', 'LoginUserController@showLogin');

Route::prefix('/jasa')->group(function(){
    Route::get('/register', 'Auth\RegisterUserController@showJasa');
    Route::post('/register', 'Auth\RegisterUserController@registerJasa')->name('register.jasa.submit');
    
    Route::get('/login', 'Auth\LoginUserController@showJasa');
    Route::post('/login', 'Auth\LoginUserController@loginJasa')->name('login.jasa.submit');
    
    Route::get('/logout', 'Auth\LogoutUserController@logout');

    Route::get('/', 'ProfilController@showJasa');

    Route::get('/kostum', 'KostumController@showKostumJasa');

    Route::get('/tambah-kostum', 'KostumController@showTambahKostum')->name('tambah.kostum');
    Route::post('/tambah-kostum', 'KostumController@uploadKostum')->name('kostum.submit');

    Route::get('/edit-kostum', 'KostumController@showEditKostum');
    Route::post('/edit-kostum', 'KostumController@editKostum')->name('edit.kostum.submit');
});

Route::prefix('/penyewa')->group(function(){
    Route::get('/register', 'Auth\RegisterUserController@showPenyewa');
    Route::post('/register', 'Auth\RegisterUserController@registerPenyewa')->name('register.penyewa.submit');
    
    Route::get('/login', 'Auth\LoginUserController@showPenyewa');
    Route::post('/login', 'Auth\LoginUserController@loginPenyewa')->name('login.penyewa.submit');
    
    Route::get('/logout', 'Auth\LogoutUserController@logout');
    
    Route::get('/', 'ProfilController@showPenyewa');
});


    
Route::get('/', 'WelcomeController@index');

Route::get('/homeshop', function(){
    return view('home');
});



Route::get('/login-baru', function(){
    return view('auth/login-baru');
});
Route::get('/register-baru', function(){
    return view('auth/register-baru');
});


