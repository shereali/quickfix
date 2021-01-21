<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['namespace' => 'API\Backend\Auth', 'middleware' => 'api'], function(){
    Route::post('/signin', 'AuthController@signIn');
    Route::post('/signup', 'AuthController@signUp');
    Route::post('/signout', 'AuthController@signOut');
});


Route::group(['middleware' => 'auth:sanctum'], function(){

    Route::group(['namespace'  => 'API\Backend'], function(){
    
        Route::group(['namespace' => 'Auth'], function(){
            Route::apiResources([

            'roles' => 'RoleController',
            'users' => 'UserController'

            ]);
        });

        Route::apiResources([

            'brands'        => 'BrandController',
            'services'      => 'ServiceController', 
            'device-models' => 'DeviceModelController', 
            'discounts'     => 'DiscountController', 
            'device-types'  => 'DeviceTypecontroller', 
            'device'        => 'DeviceController', 

            ]);
    });

});


Route::group(['namespace' => 'API\Frontend', 'middleware' => 'api'],function(){
    Route::group(['namespace' => 'General'], function(){
        Route::apiResources([
            'get-quotation' => 'QuotationController',
            'instant-call' => 'InstantCallController',
        ]);
    Route::post('otp-verify', 'InstantCallController@otpVerify');
    Route::post('otp-verify-quotation', 'QuotationController@otpVerify');

    });
});