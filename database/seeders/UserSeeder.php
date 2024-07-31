<?php
namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\Triates\DisableFkey;
use Database\Seeders\Triates\EnableFkey;
use Database\Seeders\Triates\TruncateTable;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    use TruncateTable, DisableFkey, EnableFkey;
    public function run(): void
    {
        $this->disableFkey();
        $this->truncate("users");
        $user = User::factory(30)->create();
        $this->enableFkey();
    }
}
