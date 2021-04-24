<?php

namespace App\Repositories\Student;
use Illuminate\Support\ServiceProvider;

class StudentServiceProvider extends ServiceProvider
{
	public function boot()
	{

	}

	public function register()
	{
		$this->app->bind(
			'App\Repositories\Student\StudentInterface',
			'App\Repositories\Student\StudentRepository'
		);
	}
}