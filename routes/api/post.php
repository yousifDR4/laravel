<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::get('/posts/{id}', 'show');
    Route::post('/posts', 'store');
    Route::put('/posts/{id}', 'update');
    Route::delete('/posts/{id}', 'destroy');
});
