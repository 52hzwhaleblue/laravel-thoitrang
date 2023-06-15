<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;


// Email Auth
Auth::routes(['verify' => true]);

// Mặc định route của Auth để dăng nhập và đăng xuất là login,logout
// Customize route cho login và logout nếu không muốn dùng mặc định của Auth

 Route::post("user-logout", function() {
     Auth::logout();
     return redirect("/");
 })->name('user.logout');

Route::get('user-login', [\App\Http\Controllers\Auth\LoginController::class ,'showLoginForm'])->name("user.showLoginForm");
Route::post('user-login', [\App\Http\Controllers\Auth\LoginController::class ,'login'])->name("user.login");

Route::get('/', [IndexController::class ,'index'])->name('index');
Route::get('/gioi-thieu', [IndexController::class,'static'])->name('gioi-thieu');
Route::get('/tin-tuc', [IndexController::class,'post'])->name('tin-tuc');

Route::get('/post/{slug}', [IndexController::class,'post_detail']);

Route::get('/san-pham', [IndexController::class,'san_pham'])->name('san-pham');
Route::get('/chi-tiet-san-pham/{slug}/{id}', [IndexController::class,'chi_tiet_san_pham'])->name('chi_tiet_san_pham');
Route::post('/load_ajax_product', [IndexController::class,'load_ajax_product']);

Route::get('/danh-muc', [IndexController::class,'danh_muc'])->name('danh_muc');
Route::get('/chi-tiet-danh-muc/{slug}/{id}', [IndexController::class,'chi_tiet_danh_muc'])->name('chi_tiet_danh_muc');



Route::middleware("auth")->group(function() {
    Route::get('/user/{user_id}', [UserController::class,'show'])->name('user.show');
    // Giỏ hàng
    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
//    Route::get('/cart/add/{id}', [CartController::class,'add'])->name('cart.add');
    Route::post('/cart-add', [CartController::class,'add'])->name('cart-add');
    Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update');
    Route::get('/cart/destroy', [CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/cart/remove/{rowId}', [CartController::class,'remove'])->name('cart.remove');
    Route::post('/cart/checkPaymentMethod', [CartController::class,'checkPaymentMethod'])->name('cart.checkPaymentMethod');
    Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');
    Route::post('/cart/ma-giam-gia', [CartController::class,'ma_giam_gia'])->name('cart.ma_giam_gia');

    // Giỏ hàng nâng cấp ajax
    Route::get('/cart/update_ajax', [CartController::class,'update_ajax'])->name('cart.update_ajax');

    // Thanh toán momo
    Route::post('momo_payment', [CartController::class,'momo_payment'])->name('cart.momo');
});

