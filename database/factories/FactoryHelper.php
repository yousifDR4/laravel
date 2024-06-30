<?php
namespace Database\Factories;

use App\Models\post;

class FactoryHelper{
public static function  factoryHelper($model){
    $count=$model::query()->count();
    if($count===0){
        $model::factory()->create()->id;
    }
    else{
      return rand(1,$count);
    }
  }
}
