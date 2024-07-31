<?php
namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use App\Models\conversations;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateconversationsRequest;
use App\Http\Requests\conversation\StoreconversationsRequest;
use Illuminate\Support\Facades\DB;

class ConversationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $conversations_id)
    {
        $data = message::query()->where('conversations_id', '=', $conversations_id)->orderBy('created_at', 'desc')->paginate(10);
        return new JsonResponse($data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreconversationsRequest $request)
    {
        $created = DB::transaction(function () use ($request) {
            try {
                $user1_id = $request->user_1;
                $user2_id = $request->user_2;
                $body = $request->body;

                $conversation = conversations::query()->create([
                    'user_1' => $user1_id,
                    'user_2' => $user2_id,
                ]);
                message::create([
                    "receiver_id" => $user2_id,
                    "body" => $body,
                    'sender_id' => $user1_id,
                    "conversations_id" => $conversation->id
                ]);
                return 201;

            } catch (\Exception $e) {
                return 404;
            }
        });
        return new JsonResponse([], $created);
    }

    /**
     * Display the specified resource.
     */
    public function show(conversations $conversations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateconversationsRequest $request, conversations $conversations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(conversations $conversations)
    {
        //
    }
}
