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

            'users'       => 'UserController',
            'roles'       => 'RoleController',
            'permissions' => 'PermissionController', 

            ]);
        });

        Route::apiResources([

            'brands'                 => 'BrandController',
            'services'               => 'ServiceController', 
            'device-models'          => 'DeviceModelController', 
            'discounts'              => 'DiscountController', 
            'device-types'           => 'DeviceTypecontroller', 
            'device'                 => 'DeviceController', 
            'device-functional-type' => 'DeviceFunctionalTypeController', 
            'service-type'           => 'ServiceTypeController', 
            'problem-type'           => 'ProblemTypeController', 
            'zone'                   => 'ZoneController', 
            'device-problems'        => 'DeviceProblemController', 
            'experience-category'    => 'ExprienceCategoryController', 
            'customers'              => 'CustomerController', 
            'bonus'                  => 'BonusController', 
            'work-experience'        => 'WorkExperienceController', 
            'corporate-clients'      => 'CorporateClientController', 
            'business-partners'      => 'BusinessPartnerController', 

            ]);
            Route::post('divisions-wise-districts', 'AdminCommonController@divisionWiseDistrict');
            Route::post('districts-wise-zone', 'AdminCommonController@districtWiseZone');

    });

    // for customer support
    Route::group(['namespace'  => 'API\Backend\CustomerSupport'], function(){
    
        Route::group(['namespace' => 'Auth'], function(){
            Route::apiResources([

            'users'       => 'UserController',
            'roles'       => 'RoleController',
            'permissions' => 'PermissionController', 

            ]);
        });

        Route::apiResources([

            
            'customers'              => 'CustomerController', 
            'corporate-clients'      => 'CorporateClientController', 
            'business-partners'      => 'BusinessPartnerController', 
            'call-request'           => 'CallRequestController', 

            ]);
            // Route::post('divisions-wise-districts', 'AdminCommonController@divisionWiseDistrict');
            // Route::post('districts-wise-zone', 'AdminCommonController@districtWiseZone');

    });

});


Route::group(['namespace' => 'API\Frontend', 'middleware' => 'api'],function(){
    Route::group(['namespace' => 'General'], function(){
        Route::apiResources([
            'get-quotation' => 'QuotationController',
            'instant-call' => 'InstantCallController',
            'devices     ' => 'DeviceController',
        ]);
    Route::post('otp-verify', 'InstantCallController@otpVerify');
    Route::post('otp-verify-quotation', 'QuotationController@otpVerify');

    });
});