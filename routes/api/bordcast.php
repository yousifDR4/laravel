<?php

use App\Events\ExampleEvent;
use App\Http\Controllers\ExampleController;

Route::get('/broadcast', function () {
    event(new ExampleEvent());

});

