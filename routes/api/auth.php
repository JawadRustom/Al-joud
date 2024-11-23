<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::middleware('logged.in.check')->group(function () {
        Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
//        Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user', [\App\Http\Controllers\AuthenticationController::class, 'user']);
        Route::post('/logout', [\App\Http\Controllers\AuthenticationController::class, 'logout']);
    });
});

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
