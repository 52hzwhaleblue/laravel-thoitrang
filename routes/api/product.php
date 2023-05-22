<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){
    
    Route::controller(CategoryController::class)->group(function(){
    
        Route::post('/cate/fetch-categories','fetchCategories');

        Route::post('/cate/fetch-product-by-category','fetchProductByCategory');

    });
    
    Route::controller(ProductController::class)->group(function(){
    
        Route::post('/product/fetch-product-all','fetchAll');

        Route::post('/product/fetch-popular','fetchPoppular');

        Route::post('/product/fetch-new-product','fetchNewProduct');

        Route::post('/product/fetch-sale-product','fetchSaleProduct');

        Route::post('/product/search','search');

        Route::post('/product/get-detail','getDetail');
        
        Route::post('/product/get-promotion','fetchPromotion');

        Route::post('/product/update-promotion','updateLimitPromo');



    });

    Route::controller(ReviewController::class)->group(function(){
    
        Route::post('/review/fetch-review','fetchData');  

        Route::post('/review/create-review','create');   

    });

    Route::controller(OrderController::class)->group(function(){
    
        Route::post('/order/create','create');  

        Route::post('/order/fetch-order','fetchAll');   

        Route::post('/order/delete-order','delete');   

        Route::post('/order/check-promotion','checkPromotion');   

    });
});
