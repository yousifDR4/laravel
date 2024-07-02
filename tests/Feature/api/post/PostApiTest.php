<?php

namespace Tests\Feature\api\post;
use App\Models\post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function PHPUnit\Framework\assertTrue;
class PostApiTest extends TestCase
{use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index(){
        $posts=post::factory(10)->create();
        $posts_id=$posts->map(fn($post)=>$post->id);
        $response=$this->json('get',"api/posts");
        $data=collect($response->json("data"));
        $data->each(fn($post)=>$this->assertTrue(in_array($post["id"],$posts_id->toArray())));
        $response->assertStatus(200);
    }
    public function test_show(){
        $post = Post::factory()->create();
        $post_id = $post->id;
        $response = $this->json('GET', "api/posts/{$post_id}");
        $data = collect($response->json("data"))->only(array_keys($post->getAttributes()));
        dump($post);
        dump($data);
        $data->each(function ($value,$key) use($post){

            if($key!=="created_at"&& $key!== "updated_at")
            $this->assertSame(data_get($post,$key),$value);
        }
        );
    }

}
