<?php

namespace Database\Factories;

use App\Models\message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\conversations>
 */
class ConversationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_1=FactoryHelper::factoryHelper(User::class);
        $user_2=FactoryHelper::factoryHelper(User::class);
        $last_message=FactoryHelper::factoryHelper(message::class);
        return [
            'user_1'=>$user_1,'user_2'=>$user_2,'last_message'=>$last_message,
        ];
    }
}
