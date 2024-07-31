<?php
use App\Http\Controllers\groupController;
use App\Http\Controllers\PostController;
use App\Models\group;
use Illuminate\Support\Facades\Route;

Route::controller(groupController::class)->group(function () {
    Route::get('groups/{group_id}/messages', 'index');
    Route::get('group/{group_id}/users', 'members');

});
