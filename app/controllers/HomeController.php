<?php

class HomeController extends BaseController {


	public function showWelcome($condoName)
	{
		if( Auth::user() )
			return Redirect::to('adminDashboard');
		else
			return View::make('login')->with('condoName', $condoName);
	}


}
