<?php
namespace Database\Factories;

use App\Models\conversations;
use App\Models\group;
use App\Models\message;
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
    public function configure(): static
    {
        return $this->afterCreating(function (message $message) {
            if ($message->receiver_id !== null) {
                $conversation = conversations::where('user_1', $message->sender_id)
                    ->where('user_2', $message->receiver_id)
                    ->first();

                if ($conversation) {
                    $conversation->last_message = $message->id;
                    $conversation->save();
                }
            } else {
                $group = group::find($message->group_id);
                $group->last_message = $message->id;
                $group->save();
            }

            // ...
        });
    }
    public function definition(): array
    {



        $conversationId = null;
        $groupId = null;
        $UserId1 = FactoryHelper::factoryHelper(User::class);
        $UserId2 = null;
        if ($this->faker->boolean(70)) {
            $conversationId = FactoryHelper::factoryHelper(conversations::class);
            $conversation = conversations::find($conversationId);
            $UserId1 = $conversation->user_1;
            $UserId2 = $conversation->user_2;
        } else {
            $groupId = FactoryHelper::factoryHelper(group::class);
            $group = group::find($groupId);
            $group->users()->attach($UserId1);

        }

        return [
            "sender_id" => $UserId1,
            'receiver_id' => $UserId2,
            "conversations_id" => $conversationId,
            'group_id' => $groupId,
            "body" => $this->faker->text()
        ];
    }
}
