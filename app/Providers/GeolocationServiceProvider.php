<?php

namespace App\Providers;

use app\services\geolocation\Geolocation;
use app\services\map\map;
use app\services\satlite\satlite;
use Illuminate\Support\ServiceProvider;

class GeolocationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(Geolocation::class ,function($app){

            return new Geolocation(
            $app->make(satlite::class),$app->make(map::class),);

        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
