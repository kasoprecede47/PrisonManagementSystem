<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::controller('auth','Auth\AuthController');
Route::controller('password','Auth\PasswordController');
// 'middleware' => 'auth'
Route::group([],function(){
    Route::resource('prisoner','PrisonerController');
    Route::resource('guard','GuardController');
    Route::resource('cell','GuardController');
});