<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/test', function (Request $request) {
    return "salam";
});

Route::post('/sum', function (Request $request) {
    $a =  $request->a;
    $b =  $request->b;
	return $a+$b;
});

Route::post('/book/get', [BookController::class, 'get']);
