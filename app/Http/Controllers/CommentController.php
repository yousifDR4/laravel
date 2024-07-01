<?php

namespace App\Http\Controllers;

use App\Models\comment;
use App\Http\Requests\StorecommentRequest;
use App\Http\Requests\UpdatecommentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comment=comment::query()->get();
        return new JsonResponse([
            "data"=>$comment
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created=comment::create([
            'body' => $request->body,
            "content"=>$request->content
        ]);
        return new JsonResponse([
            "date"=>$created
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(comment $id)
    {
        return new JsonResponse([
            "date"=>$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comment $id)
    {
        $updated=$id->update([
            'title' => $request->title ?? $id->title,
            'body' => $request->body ?? $id->body,
            "content"=>$request->content ?? $id->content
        ]);
        return new JsonResponse([
            "date"=>$id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $id)
    {
        $isdeleted=$id->forceDelete();
        if($isdeleted===true)
        return new JsonResponse([
            "date"=>"deleted"
        ]);
        else{
            return new JsonResponse([
                "date"=>"not deleted"
            ],400);
        }    }
}
