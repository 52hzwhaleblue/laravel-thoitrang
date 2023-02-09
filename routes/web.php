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

// Photo Controller
use App\Http\Controllers\Admin\PhotoController;

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
        // Sản phẩm
        Route::resource('product-list', ProductListController::class);
        Route::resource('product-cat', ProductCatController::class);
        Route::resource('product-man', ProductController::class);

        // Xóa tất cả
        Route::post('product-man/deleteAll', [ProductController::class,'deleteAll'])->name('deleteAll');

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

        // Hình ảnh Video
        Route::group([
            'prefix' => 'photo',
            'as' => 'photo.',
        ], function(){
            // Slideshow
            Route::resource('slideshow', PhotoController::class);

            // Video
            Route::resource('video', PhotoController::class);

            // Banner
            Route::resource('banner', PhotoController::class);
        });

});
