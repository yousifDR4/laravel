<?php

namespace Database\Factories;

use App\Models\post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
   $postId=FactoryHelper::factoryHelper(post::class);
   $userId=FactoryHelper::factoryHelper(User::class);
        return [
            "body"=>[],
            "user_id"=>$userId,
            "post_id"=>$postId,
            "content"=> $this->faker->word()
        ];
    }
}
