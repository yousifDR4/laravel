<?php

use App\Events\ExampleEvent;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\ResetUserPassword;
use App\Http\Controllers\ExampleController;
Route::get('/broadcast', function () {
    event(new ExampleEvent());

});
Route::get('/notf', function () {

    return view('notf');

});

Route::get('/', function () {

    return view('welcome');
});

Route::get('/test', function () {
    return view('dumy');
});


