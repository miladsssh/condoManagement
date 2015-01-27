<?php

use Cygnus\Commands\User\UserRegisterCommand;
use Cygnus\Forms\UserLoginValidation;
use Cygnus\Forms\UserRegistrationValidation;
use Cygnus\Core\CygnusResponse;

/**
 * Class UserController
 */
class UserController extends BaseController {

	use CygnusResponse;

	/**
	 * @var UserRegistrationValidation
	 */
	private $userRegistrationValidation;
	/**
	 * @var UserLoginValidation
	 */
	private $userLoginValidation;


	/**
	 * @param UserRegistrationValidation $userRegistrationValidation
	 * @param UserLoginValidation $userLoginValidation
     */
	public function __construct(UserRegistrationValidation $userRegistrationValidation, UserLoginValidation $userLoginValidation ){
		$this->userRegistrationValidation = $userRegistrationValidation;
		$this->userLoginValidation = $userLoginValidation;
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->userRegistrationValidation->validate( Input::all() );

		$user = $this->execute(UserRegisterCommand::class);
		Auth::login($user);
		//all the message
		return $this->sendJsonMessage('success',200);

	}


	/**
	 * @return mixed
	 * @throws \Laracasts\Validation\FormValidationException
     */
	public function login()
	{
		$formData = Input::only('email','password');
		$this->userLoginValidation->validate($formData);
		$remember = false;

		if( Input::only('remember') )
			$remember = true;

		if(Auth::attempt($formData,$remember)) {
			return $this->sendJsonMessage('success',200);
		}else{
			return $this->sendJsonMessage('error',400);
		}

	}


	/**
	 * @return mixed
	 */
	public function logout()
	{
		Auth::logout();
		return $this->sendJsonMessage('success',200);
	}





	public function forget()
	{
		dd('forget');
	}





	/**
	 * @return mixed
	 */
	public function destroy()
	{
		dd('remove user');
	}



}