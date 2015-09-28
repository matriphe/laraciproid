<?php
/**
 * Laravel 4 - Persistant Settings
 *
 * @author   Andreas Lutro <anlutro@gmail.com>
 * @license  http://opensource.org/licenses/MIT
 * @package  l4-settings
 */

namespace Matriphe\LaravelCityProvinceID;

use Illuminate\Foundation\Application;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
	protected $defer = true;

	public function register()
	{
        if (version_compare(Application::VERSION, '5.0', '>=')) {
			$this->mergeConfigFrom(
			    __DIR__.'/config/config.php', 'laravelcityprovinceid'
            );
		}
	}

	public function boot()
	{
        if (version_compare(Application::VERSION, '5.0', '>=')) {
			$this->publishes([
				__DIR__.'/config/config.php' => config_path('laravelcityprovinceid.php')
			], 'config');

			$this->publishes([
                __DIR__.'/migrations/' => database_path('migrations')
            ], 'migrations');
		}
	}

}
