<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ExampleEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message="lol";
    public $status;

    // public function __construct($message)
    // {
    //     $this->message = $message;
    // }


    public function broadcastOn()
    {
        return [new Channel('example-channel')];
    }

    // public function broadcastAs()
    // {
    //     return 'ExampleEvent';
    // }
}

