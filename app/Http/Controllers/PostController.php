<?php
namespace App\Http\Controllers;
use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post=post::query()->get();
        return new JsonResponse([
            "data"=>$post
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created=Post::create([
            'title' => $request->title,
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
    public function show(post $id)
    {
        return new JsonResponse([
            "data"=>$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $id)
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
    public function destroy(post $id)
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
        }
    }
}
