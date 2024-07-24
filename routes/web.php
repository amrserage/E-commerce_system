<?php

use App\Http\Controllers\aboutController;
use App\Http\Controllers\AddToCardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\websiteController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// routes/web.php


Auth::routes([

]);



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        // 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        
        Route::group(['middleware'=>[ 'is_admin','auth'],
        'prefix'=>'admin',],function(){
        Route::get('/dashboard', [AdminController::class,'index'])->name('dashboard');
        Route::resource('/categories',CategoryController::class);
        Route::resource('/products',ProductController::class);
        Route::resource('/slider',SliderController::class);
        
    });
    Route::get ('/',[websiteController::class,'index'])->name('index');
    Route::get('/categories',[websiteController::class,'getcategories'])->name('get_categories');
    Route::get('/category/{slug}', [websiteController::class, 'getCategoryBySlug'])->name('get_category_slug');
    Route::get('/category/{category_slug}/{product_slug}',[websiteController::class,'getProductBySlug'])->name('get_product_slug');
    Route::post('/product/add_to_cart',[AddToCardController::class,'addToCart'])->name('product.addToCart');
    Route::get('Search',[websiteController::class,'getproductSearch']);

    Route::group(['middleware'=>[ 'auth']],function(){
        Route::post('cart',[AddToCardController::class,'cart']);
        Route::get('cart',[AddToCardController::class,'index'])->name('cart.index');
        Route::delete('cart/destroy/{id}',[AddToCardController::class,'destroy'])->name('cart.destroy');
        Route::post('cart/update',[AddToCardController::class,'update'])->name('cart.update');
        Route::get('checkout/',[CheckOutController::class,'index'])->name('checkout.index');
        Route::post('checkout/place_order',[CheckOutController::class,'place_order']);
        Route::get('about',[aboutController::class,'about'])->name('about');
        Route::get('product-list',[websiteController::class,'product_listajax'])->name('product_list');
        Route::post('searchprouduct',[websiteController::class,'searchprouducts'])->name('searchprouduct');
        Route::get('users',[DashboardController::class,'users'])->name('users');
        Route::get('view-users/{id}',[DashboardController::class,'viewuser']);
        //Route::get('checkout/place_order/{id}',[CheckOutController::class,'vieworder'])->name('vieworder');
        // Route::post('/paypal',[PaymentController::class,'create'])->name('payment');
        Route::get('order',[OrderController::class,'orders'])->name('orders');
        Route::get('admin/view-orders/{id}',[OrderController::class,'vieworder']);
        Route::get('orders',[OrderController::class,'order_view'])->name('order_view');
        
    });
    });


/** OTHER PAGES THAT SHOULD NOT BE LOCALIZED **/
