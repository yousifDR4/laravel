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

        $owner_id = FactoryHelper::factoryHelper(User::class);
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->word,
            'owner_id' => $owner_id,
            'last_message' => null
        ];
    }
}
