<?php
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
route::group(function(){
route::get("comment",[CommentController::class,"index"]);
route::get("comment/{id}",[CommentController::class,"show"]);
route::put("comment/",[CommentController::class,"store"]);
route::put("comment/{id}",[CommentController::class,"update"]);
route::delete("comment/{id}",[CommentController::class,"destroy"]);
});
