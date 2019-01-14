<?php

namespace Eachdemo\CityLinkage;

use Illuminate\Support\ServiceProvider;

class CityServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // 发布
        // composer config repositories.city-linkage path ../../Extend/city-linkage
        // composer require eachdemo/city-linkage:dev-master
        // php artisan vendor:publish --provider="Eachdemo\CityLinkage\CityLinkageServiceProvider"
        $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'migrations');
        $this->publishes([__DIR__.'/../database/seeds' => database_path('seeds')], 'seeds');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
