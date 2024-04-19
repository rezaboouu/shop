<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');



Route::prefix("v1")->group(function (){
    //admin page api
    Route::prefix("admin")->group(function (){
        //product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'select']);
            Route::post('/create', [ProductController::class, 'insert']);
            Route::get('/edit/{permission}', [ProductController::class, 'edit']);
            Route::put('/update/{permission}', [ProductController::class, 'update']);
            Route::delete('/delete/{permission}', [ProductController::class, 'destroy']);
        });
    });
});


