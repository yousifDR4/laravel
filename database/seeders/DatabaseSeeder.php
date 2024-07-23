<?php
namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GroupSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        //    $this->call(PostSeeder::class);
        //    $this->call(CommentSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(ConversationsSeeder::class);
        $this->call(MessageSeeder::class);


    }
}
