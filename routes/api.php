<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->group(function(){
   Route::prefix('task')->group(function(){
       Route::get('',[ApiController::class,'getTasks']);
       Route::get('{id}',[ApiController::class,'getTask']);
       Route::post('',[ApiController::class,'createTask']);
       Route::patch('{id}',[ApiController::class,'updateTask']);
       Route::delete('{id}',[ApiController::class,'deleteTask']);
   });

   Route::prefix('user')->group(function(){
       Route::get('',[ApiController::class,'getUsers']);
       Route::get('{id}',[ApiController::class,'getUser']);
       Route::post('',[ApiController::class,'createUser']);
       Route::patch('{id}',[ApiController::class,'updateUser']);
       Route::delete('{id}',[ApiController::class,'deleteUser']);
   });

    Route::post('login',[ApiController::class,'login']);
    Route::post('logout',[ApiController::class,'logout']);
});
