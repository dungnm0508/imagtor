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

// authentication

Route::get('login',['as'=>'getLoginForm','uses'=>'LoginController@getLoginForm']);

Route::get('register',['as'=>'getRegisterForm','uses'=>'LoginController@getRegisterForm']);

Route::post('post-register',['as'=>'postRegister','uses'=>'LoginController@postRegister']);

Route::post('post-login',['as'=>'postLogin','uses'=>'LoginController@postLogin']);
