<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\RegisterController;
Route::post('/register', [RegisterController::class,"register"]);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/', function (Request $request) {
    return 200;
});
Route::post('/post',[PostController::class ,"store"]);
