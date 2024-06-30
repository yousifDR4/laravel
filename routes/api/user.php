<?php
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;
route::middleware("auth")->prefix("")->name("users.")->group(function(){
route::get("user",[UserContoller::class,"index"]);
route::get("user/{id}",[UserContoller::class,"show"])->where("id","[0,9]+");
route::put("user/",[UserContoller::class,"store"]);
route::put("user/{id}",[UserContoller::class,"update"]);
route::delete("user/{id}",[UserContoller::class,"destroy"]);
});
