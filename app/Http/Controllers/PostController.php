<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Repositories\PostRepository;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // throw new \Exception("error");
        $post = post::query()->get();
        return new JsonResponse([
            "data" => $post
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, PostRepository $repository)
    {
        $created = $repository->create($request->only([
            'title',
            'body',
            "content","user_id"
        ]));
        if($created===404){
            return new JsonResponse([
                "code" => $created,"message"=>""
            ],404);
        }
        return new JsonResponse([
            "date" => $created
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(post $id)
    {
        return new JsonResponse([
            "data" => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $id, PostRepository $repository)
    {
        $updated = $repository->update($request->only([
            'title',
            'body',
            "content"
        ]),$id);
        return new JsonResponse([
            "date" => $id
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $id,PostRepository $repository)
    {
        $isdeleted = $repository->forcedelete($id);
        if ($isdeleted === true)
            return new JsonResponse([
                "date" => "deleted"
            ]);
        else {
            return new JsonResponse([
                "date" => "not deleted"
            ], 400);
        }
    }
}
