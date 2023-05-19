<?php

use Illuminate\Support\Facades\Auth;
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

    //  Route::get('/', function () {
    //      return view('welcome');
    //  });

     Auth::routes();

     Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);
     Route::get('/collections',[App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
     Route::get('/collections/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'products']);
     Route::get('/collections/{category_slug}/{product_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'productView']);


     Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

     Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

     //   Category Routes
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
           Route::get('/category', 'index');
           Route::get('/category/create', 'create');
           Route::post('/category', 'store');
           Route::get('/category/{category}/edit', 'edit');
           Route::put('/category/{category}','update');


     });
     Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
           Route::get('/products','index');
           Route::get('/products/create', 'create');
           Route::post('/products','store');
           Route::get('/products/{id}/edit', 'edit');
           Route::put('products/{id}','update');
           Route::get('/products/{id}/delete','destroy');
           Route::get('product-image/{id}/delete','destroyImage');

        // these route for ajax methode
           Route::post('/product-color/{prod_color_id}','updateProdColorQty');

           Route::get('/product-color/{prod_color_id}/delete', 'deleteProdColor');


     });
     Route::controller(App\Http\Controllers\Admin\ColorController::class)->group(function(){

           Route::get('/colors','index');
           Route::get('/colors/create', 'create');
           Route::post('/colors/create', 'store');
           Route::get('/colors/{id}/edit', 'edit');
           Route::put('/colors/{id}', 'update');
           Route::get('/colors/{id}/delete','destroy');

     });
     Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){

        Route::get('/sliders','index');
        Route::get('/sliders/create', 'create');
        Route::post('/sliders/create','store');
        Route::get('/sliders/{id}/edit', 'edit');
        Route::put('/sliders/{slider}','update');
        Route::get('/sliders/{id}/delete','destroy');

  });
     Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);




});
