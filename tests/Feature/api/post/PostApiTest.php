<?php

namespace Tests\Feature\api\post;
use App\Models\post;
use App\Models\User;
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
        $data->each(function ($value,$key) use($post){
            if($key!=="created_at"&& $key!== "updated_at")
            $this->assertSame(data_get($post,$key),$value);
        }
        );
    }
    public function test_create()
{
    // Create a post and a user using factories
    $post = Post::factory()->create();
    $user = User::factory()->create();

    // Make a JSON POST request to the 'api/posts' endpoint
    $response = $this->json('POST', 'api/posts', [
            'title' => $post->title,
            'body' => $post->body,
            'content' => $post->content,
        'user_id' => $user->id
    ]);
    // Collect the response data and only keep the attributes of the post
    $data = collect($response->json("date"))->only(['title', 'body', 'content']);
    // Dump the response data
    // Assert that each attribute in the response matches the post
    $data->each(function($value, $key) use ($post) {
        $this->assertSame(data_get($post, $key), $value);
    });
}


}
