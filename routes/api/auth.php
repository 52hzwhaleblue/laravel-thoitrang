<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Admin\OrderController;
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
    Route::post('/auth/logout',[AuthController::class,'logout']);

});

Route::controller(AuthController::class)->group(function(){
    Route::post('/auth/login', 'login');

    Route::post('/auth/login-google', 'loginWithGoogle');

    Route::post('/auth/register', 'register');

    Route::post('/auth/check-phone','checkPhone');

    Route::post('/auth/forgot-password','forgotPassword');

});
// Route để xác thực người dùng trước khi tham gia vào channel
Route::post('/broadcasting/auth', function (Illuminate\Http\Request $request) {

    $user = $request->user();
    if (!$user) {
        return response()->json([], 403);
    }

    $presence_data = [
        'name' => $user->name,
        'user_id' => $user->id,
    ];

    return response()->json($presence_data);
});


Route::middleware('auth:sanctum')->get('/pusher/beams-auth', function (Request $request) {
    $userID = Auth::id();

    $beamsClient = new PushNotifications(array(
        "instanceId" => env('PUSHER_BEAMS_INSTANCE_ID'),
        "secretKey" =>  env('PUSHER_BEAMS_SECRET_KEY'),
    ));

    $beamsToken = $beamsClient->generateToken($userID);

    return response()->json($beamsToken);
});


