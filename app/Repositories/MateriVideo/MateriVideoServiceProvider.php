<?php

namespace App\Repositories\MateriVideo;
use Illuminate\Support\ServiceProvider;

class MateriVideoServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\MateriVideo\MateriVideoInterface',
			'App\Repositories\MateriVideo\MateriVideoRepository'
		);
	}
}