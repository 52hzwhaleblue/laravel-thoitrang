<?php

use Illuminate\Support\Facades\Route;
// Admin Controller
use App\Http\Controllers\Admin\HomeController;

// Product Controller
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductCatController;
use App\Http\Controllers\Admin\ProductController;

// Post Controller
use App\Http\Controllers\Admin\PostController;



// Admin Route
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
],function(){
    Route::resource('/', HomeController::class);

    // Sản phẩm
    Route::group([
        'prefix' => 'product',
        'as' => 'product.',
    ], function(){

        // Check slug
        Route::get('check-slug', [ProductListController::class,'checkSlug'])->name('checkSlug');
        // Sản phẩm
        Route::resource('product-list', ProductListController::class);
        Route::resource('product-cat', ProductCatController::class);
        Route::resource('product-man', ProductController::class);
    });

    // Bài viết
    Route::group([
        'prefix' => 'post',
        'as' => 'post.',
    ], function(){
        // Tin tức
        Route::resource('tin-tuc', PostController::class);

        // Tiêu chí
        Route::resource('tieu-chi', PostController::class);

        // Hình thức thanh toán
        Route::resource('hinh-thuc-thanh-toan', PostController::class);
    });

});
