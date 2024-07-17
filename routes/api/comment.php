<?php
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
Route::controller(CommentController::class)->group(function () {
    Route::get('/comments', 'index');
    Route::get('/comments/{id}', 'show');
    Route::post('/comments', 'store');
    Route::put('/comments/{id}', 'update');
    Route::delete('/comments/{id}', 'destroy');
});
