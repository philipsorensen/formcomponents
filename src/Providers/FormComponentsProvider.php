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
	}
}