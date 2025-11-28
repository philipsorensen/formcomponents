<?php

namespace PhilipSorensen\FormComponents\Providers;

use Illuminate\Support\ServiceProvider;

class FormComponentsProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->loadViewsFrom(__DIR__.'/../resources/views', 'formcomponents');
        $this->publishes([
            __DIR__.'/../config/formcomponents.php' => config_path('formcomponents.php'),
        ], 'config');
	}

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/formcomponents.php', 'formcomponents'
        );
    }
}