<?php

namespace Bhuvidya\Countries;

use Illuminate\Support\ServiceProvider;
use Bhuvidya\Countries\MakeSeederCommand;

class CountriesServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;


    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // config file
        if ($this->app->runningInConsole()) {
            $source = realpath(__DIR__ . '/../config/countries.php');
            $this->publishes([ $source => config_path('countries.php') ], 'config');
        }

        // migrations
        $this->loadMigrationsFrom(realpath(__DIR__ . '/../migrations'));
    }

    /**
     * Register everything.
     *
     * @return void
     */
    public function register()
    {
        $source = realpath(__DIR__ . '/../config/countries.php');
        $this->mergeConfigFrom($source, 'countries');
    }
}
