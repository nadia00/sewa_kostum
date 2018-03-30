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
    Route::get('/register', 'Auth\RegisterUserController@showRegisterJasa');
    Route::post('/register', 'Auth\RegisterUserController@registerJasa')->name('register.jasa.submit');
    
    Route::get('/login', 'Auth\LoginUserController@showLoginJasa');
    Route::post('/login', 'Auth\LoginUserController@loginJasa')->name('login.jasa.submit');
    
    Route::get('/profil', 'ProfilController@showProfilJasa');
});

//Auth::roregisterJasautes();

Route::get('/home', 'HomeController@index');
