<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Middleware\AuthorizedConversation;

// add auth middlware to authintacit user
route::withoutMiddleware("")->group(function () {
    Route::post("message", [MessageController::class, "store"]);
    Route::get("messages/group/{group_id}", [MessageController::class, "group"]);
    Route::delete("message/{id}", [MessageController::class, "destroy"]);
    Route::get("conversations/messages/{id}", [MessageController::class, "getAllUserWithLastMessage"]);

});



