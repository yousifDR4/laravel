<?php
namespace Database\Seeders\Triates;

use Illuminate\Support\Facades\DB;

trait TruncateTable {
protected function truncate($table){
    DB::table('users')->truncate();
}

}