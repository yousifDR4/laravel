<?php
namespace App\Repositories;
abstract class BaseRepository
{
    abstract public function create(array $attributes);

   abstract public function update(array $attributes,$model);

    abstract public function forcedelete($model);
}
