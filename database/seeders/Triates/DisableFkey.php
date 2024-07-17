<?php
namespace Database\Seeders\Triates;

use Illuminate\Support\Facades\DB;

trait DisableFkey {
protected function disableFkey(){
    DB::statement('SET FOREIGN_KEY_CHECKS=0');
}

}
