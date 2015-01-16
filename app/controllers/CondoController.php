<?php

use Cygnus\Commands\Condominium\CondoRegisterCommand;
use Cygnus\Commands\Condominium\CondoUpdateCommand;
use Cygnus\Core\CommandBus;
use Cygnus\Core\CygnusResponse;
use Cygnus\Forms\CondoRegistrationValidation;
use Cygnus\Repo\Condominium\CondoRepo;


class CondoController extends \BaseController {


	use CommandBus;
	use CygnusResponse;


	protected $condoRepository;

	protected $condoRegistrationValidation;

	public function __construct(CondoRegistrationValidation $condoRegistrationValidation, CondoRepo $condoRepository){
		$this->condoRegistrationValidation = $condoRegistrationValidation;
		$this->condoRepository = $condoRepository;
	}



	/**
	 * Display a listing of the resource.
	 * GET /condo
	 *
	 * @return Response
	 */
	public function index()
	{
		$condo = $this->condoRepository->getAllForUser(Auth::user());
		return $condo->toJson();
	}


	/**
	 * Store a newly created resource in storage.
	 * POST /condo
	 *
	 * @return Response
	 */
	public function store()
	{
		$this->condoRegistrationValidation->validate( Input::all() );
		extract(Input::only('name'));
		$this->execute(
			new CondoRegisterCommand($name, Auth::user()->id)
		);
		return $this->sendJsonMessage('success',200);
	}

	/**
	 * Display the specified resource.
	 * GET /condo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$condo = $this->condoRepository->getCondoById($id);
		return $condo->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /condo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//$this->condoRegistrationValidation->validate( Input::all() );
		extract(Input::only('name'));
		$this->execute(
			new CondoUpdateCommand($id, $name)
		);
		return $this->sendJsonMessage('success',200);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /condo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}