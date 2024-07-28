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
    public function index(request $request, $conversations_id)
    {

    }

    public function getAllUserWithLastMessage(request $request, $id)
    {
        $data1 = $this->messagesServices->getuserConversationsLastMessage($id);
        $data2 = $this->messagesServices->getGroupsUsers($id)->get();
        $data3 = $data1->concat($data2)->sortByDesc('message_created_at');
        $dataFiltered = $data3->filter(function ($item) {
            return (isset($item->group_id) && !is_null($item->group_id)) ||
                (isset($item->conversation_id) && !is_null($item->conversation_id));
        });

        // Debugging the filtered data to verify structure

        // Group by either 'group_id' or 'conversation_id'
        $dataGrouped = $dataFiltered->groupBy(function ($item) {
            if (isset($item->group_id) && !is_null($item->group_id)) {
                return 'group_' . $item->group_id;
            } elseif (isset($item->conversation_id) && !is_null($item->conversation_id)) {
                return 'conversation_' . $item->conversation_id;
            }
            return 'undefined';
        })->map(function ($group) {
            return $group->sortByDesc('message_created_at')->values(); // Ensure the sorted collection is reindexed
        })->filter(function ($value, $key) {
            return $key !== 'undefined';
        });
        return new JsonResponse(['data' => $dataGrouped]);
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
