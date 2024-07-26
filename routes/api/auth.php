<?php
use App\Http\Controllers\AuthContrller;

use Illuminate\Support\Facades\Route;

route::get("auth/user", [AuthContrller::class, "show"])->middleware('auth:sanctum');

