<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// Admin Controller
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ImageZoneController;

// Product Controller
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

// Post Controller
use App\Http\Controllers\Admin\PostController;

// Photo Controller
use App\Http\Controllers\Admin\PhotoController;

// Static Controller
use App\Http\Controllers\Admin\StaticController;

// Index Controller
use App\Http\Controllers\IndexController;

// Cart Controller
use App\Http\Controllers\CartController;



// Email Auth

Auth::routes(['verify' => true]);

Route::middleware('auth')->group(function () {
    Route::get('/', [IndexController::class ,'index'])->name('index');

});



Route::get('admin/image/show/{id}', [ImageZoneController::class,'show'])->name('admin.imagezone.show');
Route::post('admin/image/upload/{id}', [ImageZoneController::class,'upload'])->name('admin.imagezone.upload');

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
        Route::resource('product-list', CategoryController::class);
        Route::resource('product-man', ProductController::class);

        // Xóa tất cả
        Route::post('product-man/deleteAll', [ProductController::class,'deleteAll'])->name('deleteAll');

    });

    // Bài viết
    Route::group([
        'prefix' => 'post',
        'as' => 'post.',
    ], function(){
        $menus = config('menu');

        foreach($menus as $m){
            if($m['name'] == 'Bài viết'){
                foreach($m['data'] as $m1){
                    $type = $m1['type'];
                    // dd($type);
                    Route::resource($type, PostController::class);

                }
            }
        }
    });

        // Hình ảnh Video
        Route::group([
            'prefix' => 'photo',
            'as' => 'photo.',
        ], function(){

            $menus = config('menu');

            foreach($menus as $m){
                if($m['name'] == 'Hình ảnh - Video'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        // dd($type);
                        Route::resource($type, PhotoController::class);

                    }
                }
            }
        });

        // Trang tĩnh
        Route::group([
            'prefix' => 'static',
            'as' => 'static.',
        ], function(){
            $menus = config('menu');

            foreach($menus as $m){
                if($m['name'] == 'Trang tĩnh'){
                    foreach($m['data'] as $m1){
                        $type = $m1['type'];
                        // dd($type);
                        Route::resource($type, StaticController::class);

                    }
                }
            }
        });

});


// =========== user
//Route logout user account
// Route::post("logout_user", function() {
//     Auth::logout();
//     return redirect("/");
// })->name('logout.user');


// Route login user account
Route::get('login_user', function() {
    return redirect("login");
})->name("login.user");


Route::get('/', [IndexController::class,'index'])->name('index');
Route::get('/san-pham', [IndexController::class,'san_pham'])->name('san-pham');
// Route::get('/{slug}/{id}', [IndexController::class,'chi_tiet_san_pham'])->name('chi_tiet_san_pham');
Route::get('/gio-hang', [IndexController::class,'gio-hang'])->name('gio-hang');
Route::post('/load_ajax_product', [IndexController::class,'load_ajax_product']);


// Giỏ hàng
Route::get('/cart', [CartController::class,'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class,'add'])->name('cart.add');
Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update');
Route::get('/cart/destroy', [CartController::class,'destroy'])->name('cart.destroy');
Route::get('/cart/remove/{rowId}', [CartController::class,'remove'])->name('cart.remove');

// Giỏ hàng nâng cấp ajax
Route::get('/cart/update_ajax', [CartController::class,'update_ajax'])->name('cart.update_ajax');
Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');




