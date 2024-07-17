<?php

namespace App\Http\Controllers;

use App\Models\conversations;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreconversationsRequest;
use App\Http\Requests\UpdateconversationsRequest;

class ConversationsController extends Controller
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
    public function store(StoreconversationsRequest $request)
    {
        //
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
