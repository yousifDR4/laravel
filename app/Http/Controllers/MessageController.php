<?php
namespace App\Http\Controllers;

use App\Models\message;
use App\Events\messageEvent;

use App\Services\MessagesServices\messagesServices;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\conversations;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\message\StoremessageRequest;
use App\Http\Requests\UpdatemessageRequest;


class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected messagesServices $messagesServices)
    {

    }
    public function index(conversations $conversations_id)
    {
        $data = message::query()->where("conversations_id", "=", $conversations_id->id)->OrderBy("created_at", "desc")->get(["body", "sender_id", "created_at"]);
        return new JsonResponse(["data" => $data]);

    }
    public function getAllUserWithLastMessage(request $request, $id)
    {
        // $data = $this->messagesServices->getuserConversationsLastMessage($id);
        // $data = $this->messagesServices->getuserGroupsLastMessage($id)->get();
        $data = $this->messagesServices->getGroupsUsers($id)->get();
        return new JsonResponse(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoremessageRequest $request)
    {
        $message = message::query()->create([
            "body" => $request->body,
            "sender_id" => $request->sender_id,
            "conversations_id" => $request->conversations_id
        ]);
        broadcast(new messageEvent($message, $request->conversations_id))->toOthers();
        return new JsonResponse([], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatemessageRequest $request, message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(message $id)
    {
        $id->delete();
        return new JsonResponse(['message' => 'Message deleted successfully'], 202);
    }
}
