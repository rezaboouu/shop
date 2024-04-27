<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//login
Route::prefix("v1")->group(function (){
    Route::post("login",[AuthController::class ,"login"]);
    Route::post("register",[AuthController::class ,"register"]);
});

