<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::prefix("v1")->group(function (){
    //admin page api
    Route::prefix("admin")->group(function (){
        //products
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'select']);
            Route::post('/create', [ProductController::class, 'insert']);
            Route::put('/update', [ProductController::class, 'update']);
            Route::delete('/delete', [ProductController::class, 'destroy']);
        });


        //posts
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'select']);
            Route::post('/create', [PostController::class, 'insert']);
            Route::put('/update', [PostController::class, 'update']);
            Route::delete('/delete', [PostController::class, 'destroy']);
        });


        //users
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'select']);
            Route::post('/create', [UserController::class, 'insert']);
            Route::put('/update', [UserController::class, 'update']);
            Route::delete('/delete', [UserController::class, 'destroy']);
        });
    });

    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'select']);
    });


});


require __DIR__ . '/auth.php';
