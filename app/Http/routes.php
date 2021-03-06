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
Route::controller('auth','Auth\AuthController');
Route::controller('password','Auth\PasswordController');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/','DashboardController@index');
    Route::resource('prisoner','PrisonerController');
    Route::resource('transfer','PrisonerTransferController');
    Route::controller('activities','PrisonActivitiesController');
    Route::resource('guard','GuardController');
    Route::resource('visitor','VisitorController');
    Route::resource('profile','ProfileController',['only'=> ['show','edit','update'] ]);
});

Route::get('prisoner-pic/{path}',function($path){
    $path = storage_path("prisoners/".$path);
    if(!File::exists($path)){
        abort(404);
    }
    header('content-type: image/jpeg');
    echo File::get($path);
});