<?php namespace App\Extension\Validation;

use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider {

	public function register(){
		$app = $this->app;

		$app->bind('App\Extension\Validation\ValidationServiceProvider', function($app)
		{
			return new SomeValidator( $app['validator'] );
		});
	}

	public function boot()
	{
		$this->app->validator->resolver(function($translator, $data, $rules, $messages)
		{
			return new CustomValidator($translator, $data, $rules, $messages);
		});
	}

}

