<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

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
    
});
// Route để xác thực người dùng trước khi tham gia vào channel
Route::post('/broadcasting/auth', function (Illuminate\Http\Request $request) {
    $socket_id = $request->input('socket_id');
    $channel_name = $request->input('channel_name');
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
