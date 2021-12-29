<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\mainController;
use App\Http\Controllers\Site\UserController;
use App\Http\Controllers\Site\places\placesController;
use App\Http\Controllers\Site\job\JobsController;
use App\Http\Controllers\Site\copouns\CopounsController;
use App\Http\Controllers\Site\profile\MyPlaceController;
use App\Http\Controllers\Site\products\productsController;
use App\Http\Controllers\Site\products\ordersController;
use App\Http\Controllers\Dashboard\places\placeController;
use App\Http\Controllers\Site\products\OrdersCoupons;
use App\Http\Controllers\Site\profile\ControlCopounsController;
use App\Http\Controllers\Site\profile\UserProductsController;
use App\Http\Controllers\Site\profile\UserJobsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ForgotPasswordController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */
// Route::view('/welcome', 'welcome');
// Route::any('{all}', [mainController::class, 'homePage'])->where('all', '^(?!api).*$');

Auth::routes();
Route::get('/get_subcategory{id}', [mainController::class, 'get_subcategory']);
Route::get('/logout', [mainController::class, 'site_logout'])->name('logout');

Route::get('/contactUs', [mainController::class, 'contactUs'])->name('site.contactUs');

Route::group([ 'middleware' => 'guest'], function() {

    Route::get('/', [mainController::class, 'homePage'])->name('get.site');
    Route::get('/index', [mainController::class, 'homePage'])->name('get.site');


    Route::post('/Site_login', [UserController::class, 'Site_login'])->name('site.login');

    Route::post('/Site_register', [UserController::class, 'Site_register']);


});

Route::group([ 'middleware' => 'auth:web'], function() {

    Route::get('/home', [UserController::class, 'homePage'])->name('get.site');

    Route::get('/profileDashboard', [UserController::class, 'profile_dash'])->name('site.profile.dash');
});



// Start Places
    Route::get('/places', [placesController::class, 'index']);
    Route::get('/places/{id}', [placesController::class, 'show']);

// End Places

// Start Jobs

Route::get('/jobs', [JobsController::class, 'index']);
Route::get('/jobs/{id}', [JobsController::class, 'show']);

// End Jobs

// Start Copouns or Discounts Show Site
Route::get('/copouns', [CopounsController::class, 'index']);
// End Copouns or Discounts Show Site

// Start Products

Route::get('/products', [productsController::class, 'index']);
Route::get('/products/{id}', [productsController::class, 'show']);
// End Products



Route::group([ 'middleware' => 'auth:web'], function() {
// Start Orders Products
Route::post('/order', [ordersController::class, 'add_order']);
Route::get('/orders', [ordersController::class, 'show'])->name('orders');

Route::get('/orders_don', [ordersController::class, 'show_order_don'])->name('show_order_don');

Route::delete('/order/delete/{id}', [ordersController::class, 'destroy']);
Route::post('/my_order', [ordersController::class, 'my_order']);

Route::post('/order_don', [ordersController::class, 'order_don']);


// End Orders Products

// Start State Order
Route::get('/cancel_order/{id}', [ordersController::class, 'cancel_order'])->name('cancel_order');
Route::get('/Accepted_order/{id}', [ordersController::class, 'Accepted_order'])->name('Accepted_order');
Route::get('/Shipped_order/{id}', [ordersController::class, 'Shipped_order'])->name('Shipped_order');
Route::get('/delivered_order/{id}', [ordersController::class, 'delivered_order'])->name('delivered_order');

// End State Order

// Start Place User
Route::post('add_place',  [MyPlaceController::class , 'add_place'])->name('user.place.add');
Route::delete('deletePlace/{id}',  [MyPlaceController::class , 'destroy']);
Route::get('new',  [MyPlaceController::class , 'form_place'])->name('user.FormPlace.add');
// End Place User

// Start Edit and Update Place
Route::get('/editePlace/{id}' , [MyPlaceController::class ,'editePlace']);
Route::post('UpdatePlace/{id}', [MyPlaceController::class , 'Update_place'])->name('user.Update_place');
Route::post('add_newImage{id}', [MyPlaceController::class , 'Add_GallaryImages'])->name('user.place.addImage');
Route::get('/destroyImage{id}', [MyPlaceController::class , 'destroy_Image'])->name('user.destroy.image');
// End Edit and Update Place
// Start Place Time
Route::post('place_newDay/{place_id}', [MyPlaceController::class , 'add_newDay'])->name('user.place.addDay');
Route::get('/destroyDay/{id}', [MyPlaceController::class , 'destroy_Day'])->name('user.destroy.day');

// End Place Time

// Start Copouns or Discounts UserAuth
Route::post('/order-coupon', [CopounsController::class, 'create']);
Route::get('/add-coupoun', [ControlCopounsController::class, 'create'])->name('user.Formcoupons.add');
Route::get('/user-coupouns/{id}', [ControlCopounsController::class, 'show'])->name('user.coupons.show');
Route::post('/add-coupoun', [ControlCopounsController::class, 'add_place_discounts'])->name('user.SaveCoupons.add');
Route::get('/editeCopouns/{id}' , [ControlCopounsController::class ,'editeCopouns']);
Route::post('UpdateCopoun/{id}', [ControlCopounsController::class , 'Update_copoun'])->name('user.Update_copoun');
Route::delete('/coupon/delete/{id}', [ordersController::class, 'destroy_coupons']); //خاص بالاوردر
Route::delete('/deleteCopoun/{place_id}/{id}', [ControlCopounsController::class, 'destroy']); //خاص بصاحب المحل

// End Copouns or Discounts User

// Start Control Products
Route::get('/all-products', [UserProductsController::class, 'index'])->name('user.all-products');
Route::get('/edit-products/{id}', [UserProductsController::class, 'edit']);
Route::post('Update-products/{id}', [UserProductsController::class , 'Update_Product'])->name('user.Update_Product');
Route::delete('/delete-product/{id}', [UserProductsController::class, 'destroy']);
Route::get('/add-product', [UserProductsController::class, 'create'])->name('user.FormProduct.add');
Route::post('/add-product', [UserProductsController::class, 'add_product'])->name('user.product.add');
Route::get('/place-products/{id}', [UserProductsController::class, 'place_products'])->name('user.place_products');//منتجات هذاالمحل

// End Control Products


// Start Control Jops
Route::get('/add-job', [UserJobsController::class, 'create'])->name('user.FormJob.add');
Route::post('/add-job', [UserJobsController::class, 'add_job'])->name('user.job.add');
Route::get('/user-all-jobs', [UserJobsController::class, 'show_all_jobs'])->name('user.all-jobs');
Route::get('/edit-jobs/{id}', [UserJobsController::class, 'edit']);
Route::post('/Update-jobs/{id}', [UserJobsController::class , 'Update_jobs'])->name('user.Update_jobs');
Route::get('/Update-jobs/{id}', [UserJobsController::class, 'edit']);
Route::delete('/delete-job/{id}', [UserJobsController::class, 'destroy']);
Route::get('/place-job/{id}', [UserJobsController::class, 'place_jobs'])->name('user.place_jobs');//وظائف هذاالمحل


Route::post('/apply-job/{place_id}', [JobsController::class, 'apply_job']);

// End Control Jops


// Start My Profile Info
Route::get('/my-profile', [UserController::class, 'my_profile'])->name('myprofile');
Route::post('/update-my-Profile', [UserController::class, 'update_myProfile'])->name('update_myProfile');


Route::get('/changePassword',[HomeController::class, 'showChangePasswordGet'])->name('changePasswordGet');
Route::post('/changePassword',[HomeController::class, 'changePasswordPost'])->name('changePasswordPost');
// End My Profile Info

// Start My Wallet Info
Route::get('/my-wallet', [UserController::class, 'my_wallet'])->name('my_wallet');

// End My Wallet Info

Route::post('add-testimonials',[mainController::class, 'add_testimonials'])->name('add_testimonials');

});

//Start get Data Ajax Place
Route::get('/get_SubCategory{id}', [placeController::class, 'get_SubCategory']);
Route::get('/get_subCity{city_id}', [placeController::class, 'get_subCity']);
Route::get('/get_locations{id}', [placeController::class, 'get_locations']);
//End get Data Ajax Place






Route::get('/search', [mainController::class, 'search'])->name('search');
Route::get('/search_tags', [mainController::class, 'search'])->name('search');





// Start forget-password
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
// End forget-password
