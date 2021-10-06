<?php

namespace App\Repositories\MateriImage;
use Illuminate\Support\ServiceProvider;

class MateriImageServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\MateriImage\MateriImageInterface',
			'App\Repositories\MateriImage\MateriImageRepository'
		);
	}
}