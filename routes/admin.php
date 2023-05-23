<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageZoneController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\PhotoController;
use App\Http\Controllers\Admin\PhotoStaticController;
use App\Http\Controllers\Admin\StaticController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StatisticController;
use App\Http\Controllers\Admin\LoginController;


Auth::routes();

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
],function () {
    Route::get('login', [LoginController::class,'showLoginView'])->name('show_login_view');
    Route::post('login', [LoginController::class,'login'])->name('login');
    Route::post('logout', [LoginController::class,'logout'])->name('logout');

    Route::group(['middleware' => ['CheckLoginAdmin']], function () {
        Route::get('/', [HomeController::class,'index'])->name('index');
        Route::get('image/show/{id}', [ImageZoneController::class,'show'])->name('imagezone.show');
        Route::post('image/upload/{id}', [ImageZoneController::class,'upload'])->name('imagezone.upload');

        // Sản phẩm
        Route::group(['prefix' => 'product', 'as' => 'product.',], function(){
            Route::resource('product-list', CategoryController::class);
            Route::resource('product-man', ProductController::class);
            Route::get('product-import', [ProductController::class,'import_view'])->name('importProduct');
            Route::post('product-upload', [ProductController::class,'import_handle'])->name('uploadProduct');
            Route::post('product-export', [ProductController::class,'export_handle'])->name('exportProduct');

            Route::post('product-man/deleteAll', [ProductController::class,'deleteAll'])->name('deleteAll');
        });

        // Bài viết
        Route::group(['prefix' => 'post','as' => 'post.',], function(){
            $menus = config('menu');
            foreach($menus as $m){
                if($m['name'] == 'Bài viết'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        Route::resource($type, PostController::class);
                    }
                }
            }
        });

        // Options
        Route::group([ 'prefix' => 'option','as' => 'option.', ], function(){
            $menus = config('menu');
            foreach($menus as $m){
                if($m['name'] == 'Options'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        Route::resource($type, OptionController::class);
                    }
                }
            }
        });

        // Hình ảnh - Video
        Route::group([ 'prefix' => 'photo', 'as' => 'photo.', ], function(){
            $menus = config('menu');
            foreach($menus as $m){
                if($m['name'] == 'Hình ảnh - Video'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        Route::resource($type, PhotoController::class);
                    }
                }
            }
        });

        // Hình ảnh Tĩnh
        Route::group(['prefix' => 'photo-static', 'as' => 'photo-static.',], function(){
            $menus = config('menu');
            foreach($menus as $m){
                if($m['name'] == 'Hình ảnh Tĩnh'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        Route::resource($type, PhotoStaticController::class);
                    }
                }
            }
        });

        // Trang tĩnh
        Route::group([ 'prefix' => 'static', 'as' => 'static.', ], function(){
            $menus = config('menu');
            foreach($menus as $m){
                if($m['name'] == 'Trang tĩnh'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        Route::resource($type, StaticController::class);
                    }
                }
            }
        });

        // Đơn hàng
        Route::get('order', [OrderController::class,'index'])->name('order.index');

        // Chi tiết đơn hàng
        // Route::get('order-detail/{order_id}/{user_id}', [OrderController::class,'edit'])->name('order.detail');
        Route::get('order-detail', [OrderController::class,'edit'])->name('order.detail');
        Route::put('order-detail/update', [OrderController::class,'update'])->name('order_detail.update');

        // Thống kê
        Route::get('filter-by-date',[StatisticController::class,'filter_by_date'])->name('filter_by_date');
        Route::post('dashboard-filter',[StatisticController::class,'filter_by_date'])->name('dashboard_filter');
    });

});


