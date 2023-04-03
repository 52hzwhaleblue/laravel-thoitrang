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

        Route::post('/user/fetch-new-order','fetchOrder');

        Route::post('/user/create-chat','createChat');

        Route::post('/user/fetch-chat','fetchChat');

        Route::post('/user/test-chat-admin','testChat');
    });

});
Route::controller(UserController::class)->group(function(){
    Route::post('/user/test-chat-admin','testChat');
});

Route::middleware('auth:sanctum')->get('/pusher/beams-auth', function (Request $request) {

    $userID = $request->user()->id;

    $beamsClient = new PushNotifications(array(
        "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
        "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
    ));
  
    $beamsToken = $beamsClient->generateToken($userID);
    return response()->json($beamsToken);
});