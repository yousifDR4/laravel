<?php
namespace Database\Factories;
use App\Models\conversations;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
  $conversationsId=FactoryHelper::factoryHelper(conversations::class);
   $UserId=FactoryHelper::factoryHelper(User::class);

        return [
            "sender_id"=>$UserId,
            "conversations_id"=>$conversationsId,
            "body"=>$this->faker->text()
        ];
    }
}
