<?php
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
route::group(function(){
route::get("post",[PostController::class,"index"]);
route::get("post/{id}",[PostController::class,"show"]);
route::put("post/",[PostController::class,"store"]);
route::post("post/{id}",[PostController::class,"update"]);
route::delete("post/{id}",[PostController::class,"destroy"]);
});
