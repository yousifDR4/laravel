<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Repositories\PostRepository;

class PostRepositoryTest extends TestCase
{
    public function test_basic_test():void
    {
        $postData = [
            'title' => 'test post',
            'content' => 'This is a test post content.',
            "user_id"=>1
        ];
        // Use dependency injection to resolve PostRepository
        $repository = $this->app->make(PostRepository::class);
        $createdPost = $repository->create($postData);

        // Assert that the created post is not null
        $this->assertNotNull($createdPost, "Failed to create post.");

        // Assert that the created post matches the expected data
        $this->assertEquals($postData["title"], $createdPost->title,"NOT created");
        $this->assertEquals($postData["title"], $createdPost->title,"NOT created");
        $this->assertEquals($postData["title"], $createdPost->title,"NOT created");
    }
}
