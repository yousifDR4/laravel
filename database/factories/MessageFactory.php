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

   $UserId1=FactoryHelper::factoryHelper(User::class);
   $UserId2=FactoryHelper::factoryHelper(User::class);
   $conversationId = null;
        $groupId = null;

        if ($this->faker->boolean(50)) {
            $conversationId = FactoryHelper::factoryHelper(conversations::class);;
        } else {
            $groupId =FactoryHelper::factoryHelper(conversations::class);
        }
        return [
            "sender_id"=>$UserId1,
            "reciver_id"=>$groupId ?null:$UserId2,
            "conversations_id"=>$conversationId,
            'group_id'=>$groupId,
            "body"=>$this->faker->text()
        ];
    }
}
