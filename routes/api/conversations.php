<?php

use App\Http\Controllers\ConversationsController;
use Illuminate\Support\Facades\Route;
// add auth middlware to authintacit user
route::withoutMiddleware("")->group(function(){
    Route::post("conversation",[ConversationsController::class,"store"]);
    Route::get("conversations/{conversations_id}",[ConversationsController::class,"index"]);
    Route::delete("conversation/{id}",[ConversationsController::class,"destroy"]);

});
