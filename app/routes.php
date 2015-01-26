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



Route::get ('/', array('as'=>'home', 'uses'=>'HomeController@showWelcome'));


Route::post('register', array('as'=>'homeToRegister', 'uses'=>'UserController@store' ));
Route::post('login', array('as'=>'homeToLogin', 'uses'=>'UserController@login' ));
Route::post('forgetPassword', array('as'=>'homeToForget', 'uses'=>'RemindersController@postRemind' ));
Route::get ('logout', array('as'=>'Logout', 'uses'=>'UserController@logout'));

Route::group(array('prefix'=>'api','before'=>'auth'),function(){
	Route::resource('condo', 'CondoController');
	Route::resource('ticket', 'TicketController');
});


Route::group(array('prefix'=>'panel','before'=>'auth'),function(){
	Route::get('index', function(){
		return View::make('tenant');
	});

	Route::get('ticket', function(){
		return View::make('tenant');
	});

	Route::get('ticket/{id}', function(){
		return View::make('tenant');
	});

	Route::get('board', function(){
		return View::make('tenant');
	});
	
});




Route::get('/adminDashboard',function()
{
	return View::make('index');
})->before('auth');
