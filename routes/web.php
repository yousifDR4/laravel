<?php

use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\ResetUserPassword;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('dumy');
});


