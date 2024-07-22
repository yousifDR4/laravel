<?php

namespace Database\Factories;

use App\Models\message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

   $last_message=FactoryHelper::factoryHelper(message::class);
   $owner_id=FactoryHelper::factoryHelper(User::class);
        return [
            'name' => $this->faker->word, 'descripition' => $this->faker->text(),
            'owner_id'=>$owner_id,
             'last_message'=>$last_message
        ];
    }
}
