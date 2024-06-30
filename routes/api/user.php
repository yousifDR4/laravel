<?php
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;
route::get("user",[UserContoller::class,"index"]);
route::get("user/{id}",[UserContoller::class,"show"]);
route::put("user/",[UserContoller::class,"store"]);
route::put("user/{id}",[UserContoller::class,"update"]);
route::delete("user/{id}",[UserContoller::class,"destroy"]);