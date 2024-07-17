<?php
namespace Database\Seeders\Triates;

use Illuminate\Support\Facades\DB;

trait EnableFkey {
protected function enableFkey(){
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
}

}
