<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use App\Models\comment;
use App\Services\userservices\getusersservices;
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

        $users = User::query()->get();
        return new JsonResponse([
            "data" => $users
        ]);
    }
    public function __construct(public getusersservices $getusersservices)
    {

    }
    public function unrealtedusers(Request $request, $id)
    {
        $data = $this->getusersservices->getUnrealteduUers($id);
        return response()->json($data);
    }

    /**
     * Store a return newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = User::query()->create([
            "email" => $request->email,
            "name" => $request->name
        ]);
        return new JsonResponse([
            "data" => "created"
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
        dd($id);
        return new JsonResponse([
            "data" => $id
        ]);
    }

}
