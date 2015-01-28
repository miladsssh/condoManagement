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



Route::group(array('domain' => 'condoapp.my'), function()
{
	Route::get('/', function() {
		return View::make('landing_page');
	});
});


Route::group(array( 'domain' => '{condoName}.condoapp.my' , 'before'=>'verifyCondoName'), function($condoName) {

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

});






