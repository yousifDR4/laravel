<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\AuthorizedConversation;
// add auth middlware to authintacit user
route::withoutMiddleware("")->group(function(){
    Route::post("message",[MessageController::class,"store"]);
    Route::get("messages/{conversations_id}",[MessageController::class,"index"]);
    Route::delete("message/{id}",[MessageController::class,"destroy"]);

});



