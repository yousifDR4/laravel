<?php

namespace Database\Seeders;

use App\Models\comment;
use Database\Seeders\Triates\DisableFkey;
use Database\Seeders\Triates\EnableFkey;
use Database\Seeders\Triates\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    use TruncateTable,EnableFkey,DisableFkey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     $this->disableFkey();
     $this->truncate("comments");
     comment::factory(3)->create();
     $this->enableFkey();
        //
    }
}
