<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Lib\AHelper;
class SimtaruProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['ahelperclass'] = $this->app->share(function($app){
            return new AHelper;
        });

        $this->app->booting(function(){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('AHelper', 'App\Lib\Facades\AHelperClass');
        });
	}

}
