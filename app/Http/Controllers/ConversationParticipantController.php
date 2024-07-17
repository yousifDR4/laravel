<?php

namespace App\Http\Controllers;

use App\Models\conversation_participant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storeconversation_participantRequest;
use App\Http\Requests\Updateconversation_participantRequest;

class ConversationParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storeconversation_participantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(conversation_participant $conversation_participant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updateconversation_participantRequest $request, conversation_participant $conversation_participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(conversation_participant $conversation_participant)
    {
        //
    }
}
