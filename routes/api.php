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
   Route::post('login',[ApiController::class,'login']);
   Route::post('logout',[ApiController::class,'logout']);

   Route::prefix('users')->group(function(){
       Route::prefix('task')->group(function(){
           Route::get('',[ApiController::class,'getAllTask']);
           Route::get('{id}',[ApiController::class,'getTask']);
           Route::post('/',[ApiController::class,'createTask']);
           Route::patch('{id}',[ApiController::class,'updateTask']);
           Route::delete('{id}',[ApiController::class,'deleteTask']);
       });
   });
});
