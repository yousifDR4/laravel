<?php

namespace App\Services\Geolocation;

use App\Services\Map\Map;
use App\Services\Satlite\Satlite;

class Geolocation {
    private $map;
    private $satlite;

    public function __construct(Satlite $satlite, Map $map) {
        $this->map = $map;
        $this->satlite = $satlite;
    }

    public function search(string $name) {
        $locationInfo = $this->map->find_adrress($name);
        return $this->satlite->pinpoint($locationInfo);
    }
}
