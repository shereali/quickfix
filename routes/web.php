<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::group(['namespace' => 'Administrator'], function(){

    Route::get('/administrator', 'HomeController@index');
    Route::get('/administrator/{anyadministrator}', 'HomeController@index')->where('anyadministrator', '.*');

});

Route::group(['namespace' => 'Backend'], function(){

    Route::get('/admin', 'HomeController@index');
    Route::get('/admin/{any}', 'HomeController@index')->where('any', '.*');

});

Route::group(['namespace' => 'Backend\CustomerSupport'], function(){

    Route::get('/customer-support', 'HomeController@index');
    Route::get('/customer-support/{anycustomer}', 'HomeController@index')->where('anycustomer', '.*');
  
});


Route::group(['namespace' => 'Frontend'], function(){

    Route::get('/', 'HomeController@index');
    Route::get('/{path}', 'HomeController@index')->where('path','([A-z\d\-\/_.]+)?');

});

