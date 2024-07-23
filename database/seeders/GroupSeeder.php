<?php

namespace Database\Seeders;

use App\Models\group;
use Illuminate\Database\Seeder;
use Database\Seeders\Triates\EnableFkey;
use Database\Seeders\Triates\DisableFkey;
use Database\Seeders\Triates\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GroupSeeder extends Seeder
{
    use TruncateTable, EnableFkey, DisableFkey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableFkey();
        $this->truncate("groups");
        group::factory(5)->create();
        $this->enableFkey();
    }
}
