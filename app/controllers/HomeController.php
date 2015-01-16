<?php

class HomeController extends BaseController {


	public function showWelcome()
	{
		if( Auth::user() )
			return Redirect::to('adminDashboard');
		else
			return View::make('login');
	}


}
