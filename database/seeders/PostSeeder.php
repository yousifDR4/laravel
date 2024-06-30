<?php
namespace Database\Seeders;
use App\Models\post;
use Database\Seeders\Triates\DisableFkey;
use Database\Seeders\Triates\EnableFkey;
use Database\Seeders\Triates\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class PostSeeder extends Seeder
{
    use TruncateTable,DisableFkey,EnableFkey;
    public function run(): void
    {
        $this->disableFkey();
        $this->truncate("posts");
        post::factory(3)->create();
        $this->enableFkey();
    }
}
