<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\UserAuthentication\UserController;
use App\Http\Controllers\Apis\UserAuthentication\ForgetPassController;
use App\Http\Controllers\Apis\GeneralController;
use App\Http\Controllers\Apis\places\placesController;
use App\Http\Controllers\Apis\places\CopounController;
use App\Http\Controllers\Apis\places\ProductsController;
use App\Http\Controllers\Apis\places\JobsController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("User_Registration", [UserController::class ,"User_Registration"]);
Route::post("app_login", [UserController::class ,"app_login"]);
Route::post("Social_Login", [UserController::class ,"Social_Login"]);

Route::post("forget_password", [ForgetPassController::class ,"forget_password"]);
Route::get("Verification_code", [ForgetPassController::class ,"Verification_code"]);
Route::post("Reset_password", [ForgetPassController::class ,"Reset_password"]);

Route::get("city_area_location", [placesController::class ,"city_area_location"]);


Route::group([
    'middleware' => 'jwt.auth',  
], function($router) {

    Route::post("update_Profile", [UserController::class ,"update_Profile"]);
    Route::get("show_userByID", [UserController::class ,"show_userByID"]);
    Route::get("Auth_logout", [UserController::class ,"Auth_logout"]);

    //category & subcategory ::
    Route::get("all_categories", [GeneralController::class ,"all_categories"]);
    Route::get("subCategory_ByCatID", [GeneralController::class ,"subCategory_ByCatID"]);

    Route::get("show_userLocations", [UserController::class ,"show_userLocations"]);
    Route::post("add_userLocation", [UserController::class ,"add_userLocation"]);
    Route::get("delete_userLocation", [UserController::class ,"delete_userLocation"]);

});


Route::group([
    'prefix' =>  'Places',
    'middleware' => 'jwt.auth',  
], function($router) {
   
    Route::post("Add_place", [placesController::class ,"Add_place"]);
    Route::get("show_place_ById", [placesController::class ,"show_place_ById"]);
    Route::post("update_place", [placesController::class ,"update_place"]);
    Route::post("add_placeTime", [placesController::class ,"add_placeTime"]);
    Route::get("show_WorkingDays_ByPlaceId", [placesController::class ,"show_WorkingDays_ByPlaceId"]);
    Route::get("show_placeTime_ById", [placesController::class ,"show_placeTime_ById"]);
    Route::post("update_placeTime", [placesController::class ,"update_placeTime"]);
    Route::get("myPlaces", [placesController::class ,"myPlaces"]);
    Route::get("place_ById", [placesController::class ,"place_ById"]);

    Route::post("place_extraDetails", [placesController::class ,"place_extraDetails"]);
    Route::get("destroy_Image", [placesController::class ,"destroy_Image"]);

    Route::group([
        'prefix' =>  'Copouns',
        'middleware' => 'jwt.auth',  
    ], function($router) {
        Route::get("place_copouns", [CopounController::class ,"place_copouns"]);
        Route::post("add_copoun", [CopounController::class ,"add_copoun"]);
        Route::post("update_copouns", [CopounController::class ,"update_copouns"]);
        Route::get("destroy_copoun", [CopounController::class ,"destroy_copoun"]);
        Route::get("place_copounsByID", [CopounController::class ,"place_copounsByID"]);
        
    });


    Route::group([
        'prefix' =>  'Products',
        'middleware' => 'jwt.auth',  
    ], function($router) {
        Route::get("place_products", [ProductsController::class ,"place_products"]);
        Route::post("add_product", [ProductsController::class ,"add_product"]);
        Route::post("update_productData", [ProductsController::class ,"update_productData"]);
        Route::get("product_active", [ProductsController::class ,"product_active"]);
        Route::get("show_productByID", [ProductsController::class ,"show_productByID"]); 
        Route::get("delete_productImage", [ProductsController::class ,"delete_productImage"]); 
        Route::post("add_productImage", [ProductsController::class ,"add_productImage"]);

   });

    Route::group([
        'prefix' =>  'Jobs',
        'middleware' => 'jwt.auth',  
    ], function($router) {
        Route::get("user_jobs", [JobsController::class ,"user_jobs"]);
        Route::post("add_job", [JobsController::class ,"add_job"]);
        Route::get("delete_job", [JobsController::class ,"delete_job"]);
        
    });
});