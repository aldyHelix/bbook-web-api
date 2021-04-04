<?php

namespace App\Repositories\Materi;
use Illuminate\Support\ServiceProvider;

class MateriServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Materi\MateriInterface',
			'App\Repositories\Materi\MateriRepository'
		);
	}
}