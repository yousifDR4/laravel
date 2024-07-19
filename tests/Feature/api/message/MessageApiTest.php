<?php

namespace Tests\Feature\api\message;

use App\Models\conversations;
use Tests\TestCase;
use App\Models\User;
use App\Models\Message;
use Illuminate\Foundation\Testing\DatabaseTruncation;
use Illuminate\Foundation\Testing\WithFaker;
class MessageApiTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_index()
    {
        $response = $this->json('get', "http://127.0.0.1:8000/api/messages/1");
        $data = collect($response->json("data"));
        $data->each(function ($message) {
            $this->assertNotEmpty($message['body']);
            $this->assertNotEmpty($message['sender_id']);
        });
    }

    public function test_show()
    {
    }

    public function test_create()
    {
        // Create a user and a conversation using factories
        $user = User::factory()->create();
        $conversation = conversations::factory()->create();
        // Define the message data
        $messageData = [
            "body" => "This is a test message",
            "sender_id" => $user->id,
            "conversations_id" => $conversation->id,
        ];
        $response = $this->postJson('http://127.0.0.1:8000/api/message', $messageData);
        $response->assertStatus(201);
        $response2 = $this->json('get', "http://127.0.0.1:8000/api/messages/{$conversation->id}");
        $data = collect($response2->json("data"));
        $filterd = $data->where('sender_id', '=', $user->id);
        $this->assertNotEmpty($filterd);
    }
}
