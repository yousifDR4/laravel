<?php

namespace App\Http\Controllers;

use App\Models\message;
use Illuminate\Http\Request;
use App\Models\conversations;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateconversationsRequest;
use App\Http\Requests\conversation\StoreconversationsRequest;

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
        $user_id = $request->user_id;
        $conversation = conversations::query()->create();
        $conversation->user()->sync([$user_id]);

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
