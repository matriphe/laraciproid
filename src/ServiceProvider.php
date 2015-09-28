<?php

namespace Matriphe\LaravelCityProvinceID;

use Illuminate\Support\ServiceProvider;

class ServiceProvider extends ServiceProvider
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
        $this->publishes([
			__DIR__.'/config/config.php' => config_path('laravelcityprovinceid.php')
		], 'config');

		$this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerSkeleton();

        $this->mergeConfigFrom(
		    __DIR__.'/config/config.php', 'laravelcityprovinceid'
        );

        config([
                 'config/laravelcityprovinceid.php',
        ]);
    }

    private function registerSkeleton()
    {
        $this->app->bind('laravelcityprovinceid',function($app){
            return new LaravelCityProvinceID($app);
        });
    }
}