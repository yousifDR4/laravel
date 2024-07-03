<?php
namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Repositories\PostRepository;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\StorepostRequest;

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
        ],200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PostStoreRequest $request, PostRepository $repository)
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
            "date" => $id,
            "updated"=>$updated
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $id,PostRepository $repository)
    {
        $isdeleted = $repository->forcedelete($id);

        return new JsonResponse([
            "date" => $isdeleted
        ]);
    }
}
