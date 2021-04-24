<?php

namespace App\Repositories\Quiz;
use Illuminate\Support\ServiceProvider;

class QuizServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Quiz\QuizInterface',
			'App\Repositories\Quiz\QuizRepository'
		);
	}
}