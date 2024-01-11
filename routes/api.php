<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResource('user', UserController::class);
Route::post('/user',[AuthController::class,'register']); 
Route::post('/login',[AuthController::class,'login']);

Route::group(["middleware" => ["auth:api"]], function(){
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::apiResource('user', UserController::class);
});