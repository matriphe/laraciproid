<?php

namespace Matriphe\Laraciproid;

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
			__DIR__.'/config/config.php' => config_path('laraciproid.php')
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
		    __DIR__.'/config/config.php', 'laraciproid'
        );

        config([
                 'config/laraciproid.php',
        ]);
    }

    private function registerSkeleton()
    {
        $this->app->bind('laraciproid',function($app){
            return new Laraciproid($app);
        });
    }
}