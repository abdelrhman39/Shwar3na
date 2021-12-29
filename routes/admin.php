<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Dashboard\LoginController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Dashboard\PackagesController;
use App\Http\Controllers\Dashboard\AreaLocationController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\SiteDataController;
use App\Http\Controllers\Dashboard\places\placeController;
use App\Http\Controllers\Site\products\ordersController;

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


Route::group([ 'prefix' => 'admin','middleware' => 'guest:admin'], function() {

    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.dashboard.login');
    Route::post('/login', [LoginController::class, 'Login_admin'])->name('dashboard.login');

});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {

    Route::get('/dashboard', [AdminController::class , 'index'])->name('dashboard.dashboard');

    Route::get('/users', [UserController::class , 'Users_page'])->name('admin.users');

    Route::get('/aboutus', [SiteDataController::class , 'aboutUs_data'])->name('admin.aboutus');

    Route::post('/update_aboutUs', [SiteDataController::class , 'update_aboutUs'])->name('admin.aboutus.update');

    Route::get('/team', [SiteDataController::class , 'team_data'])->name('admin.team');
    Route::post('/add-team', [SiteDataController::class , 'add_team'])->name('admin.add_team');
    Route::get('/delete-team/{id}', [SiteDataController::class , 'delete_team'])->name('admin.delete-team');

    Route::get('/testimonials', [SiteDataController::class , 'testimonials'])->name('admin.testimonials');
    Route::get('/delete-testimonials/{id}', [SiteDataController::class , 'delete_testimonials'])->name('admin.delete-testimonials');
    Route::get('/approv-testimonials/{id}', [SiteDataController::class , 'approv_testimonials'])->name('admin.approv-testimonials');


    Route::group(['prefix' => 'Categories'], function () {

        Route::get('/', [CategoryController::class , 'category_page'])->name('admin.Categories');
        Route::get('/edit{id}', [CategoryController::class , 'edit'])->name('admin.Categories.edit');
        Route::post('/update{id}', [CategoryController::class , 'update'])->name('admin.Categories.update');
        Route::get('/destroy{id}', [CategoryController::class , 'destroy'])->name('admin.Categories.destroy');
        Route::get('new',  [CategoryController::class , 'newCategory'])->name('admin.Categories.new');
        Route::post('new',  [CategoryController::class , 'add_category'])->name('admin.Categories.add');
        Route::get('/sub{id}', [CategoryController::class , 'subcategory_page'])->name('admin.subcategory');
        Route::get('/sub/edit{id}', [CategoryController::class , 'subcategory_Edit'])->name('admin.subcategory.edit');
        Route::post('/sub/update{id}', [CategoryController::class , 'subcategory_update'])->name('admin.subcategory.update');
        Route::get('/sub/new{id}',  [CategoryController::class , 'newSubcategory'])->name('admin.subcategory.newsub');
        Route::post('/sub/new{id}',  [CategoryController::class , 'add_subCategory'])->name('admin.subcategory.add');
        Route::get('/sub/destroy{id}', [CategoryController::class , 'destroy_subcategory'])->name('admin.subcategory.destroy');

    });

    Route::group(['prefix' => 'Packages'], function () {

        Route::get('/', [PackagesController::class , 'package_page'])->name('admin.Packages');
        Route::get('/edit{id}', [PackagesController::class , 'edit'])->name('admin.Packages.edit');
        Route::post('/update{id}', [PackagesController::class , 'update'])->name('admin.Packages.update');
        Route::get('/details{id}', [PackagesController::class , 'packageDetails_page'])->name('admin.Packages.details');
        Route::get('/details/edit{id}', [PackagesController::class , 'PackDetails_Edit'])->name('admin.Packages.editdetails');
        Route::post('/details/update{id}', [PackagesController::class , 'PackDetails_update'])->name('admin.Packages.updateDetails');
        Route::get('/details/new{id}',  [PackagesController::class , 'newPackDetails'])->name('admin.Packages.newDetails');
        Route::post('/details/new{id}',  [PackagesController::class , 'add_PackDetails'])->name('admin.Packages.add');
        Route::get('/details/destroy{id}', [PackagesController::class , 'destroy'])->name('admin.Packages.destroy');

    });

    Route::group(['prefix' => 'Area'], function () {

        Route::get('/', [AreaLocationController::class , 'Area_page'])->name('admin.Area');
        Route::get('/edit{id}', [AreaLocationController::class , 'edit'])->name('admin.Area.edit');
        Route::post('/update{id}', [AreaLocationController::class , 'update'])->name('admin.Area.update');
        Route::get('/destroy{id}', [AreaLocationController::class , 'destroy'])->name('admin.Area.destroy');
        Route::get('new',  [AreaLocationController::class , 'newArea'])->name('admin.Area.new');
        Route::post('new',  [AreaLocationController::class , 'add_area'])->name('admin.Area.add');
        Route::get('/location{id}', [AreaLocationController::class , 'location_page'])->name('admin.location');
        Route::get('/location/edit{id}', [AreaLocationController::class , 'location_Edit'])->name('admin.location.edit');
        Route::post('/location/update{id}', [AreaLocationController::class , 'location_update'])->name('admin.location.update');
        Route::get('/location/new{id}',  [AreaLocationController::class , 'newLocation'])->name('admin.location.newlocation');
        Route::post('/location/new{id}',  [AreaLocationController::class , 'add_location'])->name('admin.location.add');
        Route::get('/location/destroy{id}', [AreaLocationController::class , 'destroy_location'])->name('admin.location.destroy');

    });

    Route::group(['prefix' => 'Places'], function () {

        Route::get('/get_SubCategory{id}', [placeController::class, 'get_SubCategory']);
        Route::get('/get_subCity{id}', [placeController::class, 'get_subCity']);
        Route::get('/get_locations{id}', [placeController::class, 'get_locations']);

        Route::get('/', [placeController::class , 'places_data'])->name('admin.places');
        Route::get('place_features', [placeController::class , 'place_features']);
        Route::get('placeDetails{id}', [placeController::class , 'PlaceDetails'])->name('admin.place.details');
        Route::get('NewDays{id}', [placeController::class , 'Newday'])->name('admin.place.newDay');
        Route::post('add_newDay{id}', [placeController::class , 'add_newDay'])->name('admin.place.addDay');
        Route::get('/destroyDay{id}', [placeController::class , 'destroy_Day'])->name('admin.destroy.day');
        Route::get('/Accept_place{id}', [placeController::class , 'Accept_place'])->name('admin.place.accept');

        Route::get('/Accept_product{id}', [placeController::class , 'Accept_product'])->name('admin.product.accept');
        Route::get('/Accept_Copouns{id}', [placeController::class , 'Accept_Copouns'])->name('admin.Copouns.accept');


        Route::post('add_newCopoun{id}', [placeController::class , 'Add_Copouns'])->name('admin.place.addCopoun');
        Route::get('/destroyCopoun{id}', [placeController::class , 'destroy_Copoun'])->name('admin.destroy.copoun');
        Route::get('/destroyProduct{id}', [placeController::class , 'destroy_Product'])->name('admin.destroy.product');
        Route::post('update_Video{id}', [placeController::class , 'update_Video'])->name('admin.place.updateVideo');
        Route::post('add_newImage{id}', [placeController::class , 'Add_GallaryImages'])->name('admin.place.addImage');
        Route::get('/destroyImage{id}', [placeController::class , 'destroy_Image'])->name('admin.destroy.image');

        // Route::get('/edit{id}', [AreaLocationController::class , 'edit'])->name('admin.Area.edit');
        // Route::post('/update{id}', [AreaLocationController::class , 'update'])->name('admin.Area.update');
        // Route::get('/destroy{id}', [AreaLocationController::class , 'destroy'])->name('admin.Area.destroy');
        Route::get('new',  [placeController::class , 'newPlace'])->name('admin.place.new');
        Route::post('new',  [placeController::class , 'add_place'])->name('admin.place.add');
        // Route::get('/location{id}', [AreaLocationController::class , 'location_page'])->name('admin.location');
        // Route::get('/location/edit{id}', [AreaLocationController::class , 'location_Edit'])->name('admin.location.edit');
        // Route::post('/location/update{id}', [AreaLocationController::class , 'location_update'])->name('admin.location.update');
        // Route::get('/location/new{id}',  [AreaLocationController::class , 'newLocation'])->name('admin.location.newlocation');
        // Route::post('/location/new{id}',  [AreaLocationController::class , 'add_location'])->name('admin.location.add');
        // Route::get('/location/destroy{id}', [AreaLocationController::class , 'destroy_location'])->name('admin.location.destroy');






        // Start State Order
        Route::get('/cancel_order/{id}', [placeController::class, 'cancel_order'])->name('cancel_order');
        Route::get('/Accepted_order/{id}', [placeController::class, 'Accepted_order'])->name('Accepted_order');
        Route::get('/Shipped_order/{id}', [placeController::class, 'Shipped_order'])->name('Shipped_order');
        Route::get('/delivered_order/{id}', [placeController::class, 'delivered_order'])->name('delivered_order');

        // End State Order


    });

    // Start Wallet
    Route::post('add-Money/{id}', [UserController::class, 'addMoney'])->name('admin.addMoney');

    // End Wallet


    // Start import/Export Users
    Route::get('importExportUsers', [UserController::class, 'importExportUsers']);
    Route::get('export-users', [UserController::class, 'export_users'])->name('export_users');
    Route::post('import-users', [UserController::class, 'import_users'])->name('import_users');
    // ENd import/Export Users

    // Start import/Export Places
    Route::get('export-places', [UserController::class, 'export_places'])->name('export_places');
    Route::post('import-places', [UserController::class, 'import_places'])->name('import_places');
    // ENd import/Export Places

});




