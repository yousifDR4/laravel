<?php

namespace Tests\Feature\api\post;

use App\Models\post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class PostApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_index(){
        $posts=post::factory(10)->create();
        $posts_id=$posts->map(fn($post)=>$post->id);
        $response=$this->json('get',"api/posts");
        $data=collect($response->json("data"));
        dump($posts_id);
        $data->each(fn($post)=>$this->assertTrue(in_array($post["id"],$posts_id->toArray())));

        $response->assertStatus(200);
    }

}
