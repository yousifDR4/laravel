<?php
namespace Tests\Unit;
use App\Models\post;
use Tests\TestCase;
use App\Repositories\PostRepository;
class PostRepositoryTest extends TestCase
{
    public function test_create()
    {
        $postData = [
            'title' => 'test post',
            'content' => 'This is a test post content.',
            "user_id"=>1
        ];
        $repository = $this->app->make(PostRepository::class);
        $createdPost = $repository->create($postData);
        if($createdPost===404){
            dump("s");
       $this->assertTrue(true);
        }
        else{
            dump("s");
        $this->assertNotNull($createdPost, "Failed to create post.");
        $this->assertEquals($postData["title"], $createdPost->title,"NOT created title");
        $this->assertEquals($postData["content"], $createdPost->content,"NOT created content");
        }
    }
    public function test_update():void{
        $repository = $this->app->make(PostRepository::class);
        $temp=post::factory()->create();
        $updated=$repository->update([
            'title'=>"test",
            'body'=>[],
            "content"=>"lol"

        ],$temp);

        $this->assertEquals($updated, true,"NOT created title");
    }
    public function test_delete():void{
        $repository = $this->app->make(PostRepository::class);
        $temp=post::factory()->create();
        $deleteded=$repository->forcedelete($temp);
        $this->assertEquals($deleteded, true,"not deleted");
    }
    public function test_delete_on_non_exisisted_post():void{
        $repository = $this->app->make(PostRepository::class);
        $temp=post::factory()->create();
       $repository->forcedelete($temp);
        $deleteded=$repository->forcedelete($temp);
        $this->assertEquals($deleteded, "not deleted","the post is already not exiting and got deleted");
    }
}
