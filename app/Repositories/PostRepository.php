<?php
namespace App\Repositories;
use App\Models\post;
use Illuminate\Support\Facades\DB;
class PostRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        $created = DB::transaction(function () use ($attributes) {
            if (empty($userId))
           return 404;
            try{
            $created = Post::query()->create([
                'title' => data_get($attributes, "title"),
                'body' => data_get($attributes, "body"),
                'content' => data_get($attributes, "content")
            ]);
            $userId = data_get($attributes, "user_id");
            if (!empty($userId)) {
                $created->user()->attach($userId);
                return $created;
            }
        }
            catch(\Exception $e){
                return $e;
            }
        });
        return $created;
    }
    public function update(array $attributes, $id)
    {
        $updated = $id->update([
          'title' => data_get($attributes, "title"),
                'body' => data_get($attributes, "body"),
                "content" => data_get($attributes, "content")
        ]);

    }
    public function forcedelete( $id)
    {
        $isdeleted = $id->forceDelete();
        return $isdeleted;
    }
}
