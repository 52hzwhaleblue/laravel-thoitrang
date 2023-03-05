<?php

use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\UserController;
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
    
    Route::controller(UserController::class)->group(function(){

        Route::post('/user/me','me');

        Route::post('/user/edit-profile','editProfile');

        Route::post('/user/change-password','changePassword');

        Route::post('/user/fetch-new-order','fetchNewOrder');
    });

});
Route::controller(BaseController::class)->group(function(){

    Route::post('/test','uploadFileBanner');
});
