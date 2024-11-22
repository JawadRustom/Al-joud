<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');
Route::prefix('')->/*middleware(['language','auth.apikey'])->*/ group(function () {
    \App\Helpers\RouteHelper::includeRouteFiles(__DIR__ . '/api');
});
