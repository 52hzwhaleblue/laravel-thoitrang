<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\Api\BaseController;
use App\Http\Controllers\Api\UserController;
use Pusher\PushNotifications\PushNotifications;


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

    });

});

Route::controller(UserController::class)->group(function(){
    Route::post('/user/update-status-order','updateStatusOrder');
});

