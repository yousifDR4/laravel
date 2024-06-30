<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use Illuminate\Http\Request;

class UserContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new JsonResponse([
            "data" => "new"
        ]);
    }

    /**
     * Store a return newly created resource in storage.
     */
    public function store(Request $request)
    {
        dump($request);
        return new JsonResponse([
            "data" => "new"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $id)
    {
        dump($id);
        return new JsonResponse([
            "data" => " new"
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $id)
    {
        dump($request);
        return new JsonResponse([
            "data" => $id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $id)
    {
        dump($id);
        return new JsonResponse([
            "data" => $id
        ]);
    }
}
