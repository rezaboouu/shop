<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');





//admin page api

Route::prefix("admin")->group(function (){

    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'select']);
        Route::get('/create', [ProductController::class, 'create']);
        Route::post('/store', [ProductController::class, 'store']);
        Route::get('/edit/{permission}', [ProductController::class, 'edit']);
        Route::put('/update/{permission}', [ProductController::class, 'update']);
        Route::delete('/delete/{permission}', [ProductController::class, 'destroy']);
    });
});


