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

    // Route::post("logout_user", function() {
    //     Auth::logout();
    //     return redirect("/");
    // })->name('logout.user');

    //Route::post('login_user', function() {
    //    return redirect("login");
    //})->name("login.user");
//

Route::get('/', [IndexController::class ,'index'])->name('index');
Route::get('/gioi-thieu', [IndexController::class,'static'])->name('gioi-thieu');
Route::get('/tin-tuc', [IndexController::class,'post'])->name('tin-tuc');

Route::get('/post/{slug}', [IndexController::class,'post_detail']);

Route::get('/san-pham', [IndexController::class,'san_pham'])->name('san-pham');
Route::get('/chi-tiet-san-pham/{slug}/{id}', [IndexController::class,'chi_tiet_san_pham'])->name('chi_tiet_san_pham');
Route::post('/load_ajax_product', [IndexController::class,'load_ajax_product']);

Route::get('/user/{id}', [UserController::class,'show'])->name('user.show');


Route::middleware("CheckLogin")->group(function() {
    // Giỏ hàng
    Route::get('/cart', [CartController::class,'index'])->name('cart.index')->middleware('CheckLogin');
//    Route::get('/cart/add/{id}', [CartController::class,'add'])->name('cart.add');
    Route::post('/cart-add', [CartController::class,'add'])->name('cart-add');
    Route::patch('/cart/update', [CartController::class,'update'])->name('cart.update');
    Route::get('/cart/destroy', [CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/cart/remove/{rowId}', [CartController::class,'remove'])->name('cart.remove');
    Route::post('/cart/store', [CartController::class,'store'])->name('cart.store');
    Route::get('/cart/checkout', [CartController::class,'checkout'])->name('cart.checkout');
    Route::post('/cart/ma-giam-gia', [CartController::class,'ma_giam_gia'])->name('cart.ma_giam_gia');

    // Giỏ hàng nâng cấp ajax
    Route::get('/cart/update_ajax', [CartController::class,'update_ajax'])->name('cart.update_ajax');
});

