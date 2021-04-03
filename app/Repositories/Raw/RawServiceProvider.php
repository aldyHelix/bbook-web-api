<?php

namespace App\Repositories\Raw;
use Illuminate\Support\ServiceProvider;

class RawServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Raw\RawInterface',
			'App\Repositories\Raw\RawRepository'
		);
	}
}