<?php
use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

route::prefix("")->withoutMiddleware("auth")->group(function () {
    route::get("users", [UserContoller::class, "index"]);
    route::get("user/{id}/users", [UserContoller::class, "unrealtedusers"]);

    route::get("user/{id}", [UserContoller::class, "show"])->where("id", "[0,9]+");
    route::put("user/", [UserContoller::class, "store"]);
    route::put("user/{id}", [UserContoller::class, "update"]);
    route::delete("user/{id}", [UserContoller::class, "destroy"]);
});
