<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function(){
	return Redirect::route('login');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));


});

Route::group(array('before' => 'auth|Admin'), function()
{
	Route::get('customers',['as' => 'customer.index', 'uses' => 'CustomerController@index']);
	Route::get('customer/create',['as' => 'customer.create', 'uses' => 'CustomerController@create']);
	Route::post('customer/create',['as' => 'customer.store', 'uses' => 'CustomerController@store']);
	Route::get('customer/{id}/edit',['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
	Route::put('customer/{id}',['as' => 'customer.update', 'uses' => 'CustomerController@update']);
	Route::delete('customers/{id}',['as' => 'customer.delete', 'uses' => 'CustomerController@destroy']);
});