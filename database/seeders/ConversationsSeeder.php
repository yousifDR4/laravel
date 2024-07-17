<?php

namespace Database\Seeders;

use App\Models\conversations;
use Illuminate\Database\Seeder;
use Database\Seeders\Triates\EnableFkey;
use Database\Seeders\Triates\DisableFkey;
use Database\Seeders\Triates\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConversationsSeeder extends Seeder
{
    use TruncateTable,EnableFkey,DisableFkey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableFkey();
        $this->truncate("conversations");
        conversations::factory(10)->create();
        $this->enableFkey();
    }
}
