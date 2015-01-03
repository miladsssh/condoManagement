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


Route::post('/register', array('as'=>'homeToRegister', 'uses'=>'UserController@store' ));
Route::post('/login', array('as'=>'homeToLogin', 'uses'=>'UserController@login' ));
Route::post('/forgetPassword', array('as'=>'homeToForget', 'uses'=>'UserController@forget' ));
Route::get ('logout', array('as'=>'Logout', 'uses'=>'UserController@destroy'));

Route::post('/adminDashboard', array('as'=>'adminPanel', 'uses'=>''));

Route::any('/index', function()
{
	return View::make('index');
});
