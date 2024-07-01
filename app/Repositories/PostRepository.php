<?php
namespace App\Repositories;
use App\Models\post;
use Illuminate\Support\Facades\DB;
class PostRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        $created = DB::transaction(function () use ($attributes) {

            $created = post::query()->create([
                'title' => data_get($attributes, "title"),
                'body' => data_get($attributes, "body"),
                "content" => data_get($attributes, "content")
            ]);
            $created->user()->sync(data_get($attributes, "user_id"));
            return $created;
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
