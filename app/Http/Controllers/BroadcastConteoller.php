<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ExampleEvent;

class ExampleController extends Controller
{
    public function broadcastExampleEvent()
    {
        broadcast(new ExampleEvent('Hello WebSocket'))->toOthers();
        return response()->json(['status' => 'Event broadcasted!']);
    }
}


