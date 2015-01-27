<?php

class HomeController extends BaseController {


	public function showWelcome($condoName)
	{
		if($condoName == 'www'){
			return View::make('landing_page');
		}else{
			return View::make('login')->with('condoName', $condoName);
		}

	}


}
