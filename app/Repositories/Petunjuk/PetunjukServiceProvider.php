<?php

namespace App\Repositories\Petunjuk;
use Illuminate\Support\ServiceProvider;

class PetunjukServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Petunjuk\PetunjukInterface',
			'App\Repositories\Petunjuk\PetunjukRepository'
		);
	}
}
