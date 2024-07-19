<?php

use App\Events\ExampleEvent;
use Illuminate\Http\Request;
use App\Events\MessageReceived;
use Illuminate\Support\Facades\Route;
use App\Actions\Fortify\ResetUserPassword;
use App\Http\Controllers\ExampleController;
use Illuminate\Http\JsonResponse;

Route::get('/broadcast', function () {
    event(new ExampleEvent());

});
Route::get('/notf', function () {

    return view('notf');

});

Route::get('/', function () {

    return view("welcome");
});

Route::get('/test', function () {
    return view('dumy');
});
Route::get('/message', function () {
    event(new MessageReceived( "kkkkkkdmwpdwodmwmcwos"));
    return view('message');
});
Route::post('/message', function (Request $request) {
    $message = $request->input('message');
  event(new MessageReceived( $message));
  return new JsonResponse(["message"=>$message],200);
});

