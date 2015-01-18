<?php

use Cygnus\Commands\Condominium\CondoDeleteCommand;
use Cygnus\Commands\Condominium\CondoRegisterCommand;
use Cygnus\Commands\Condominium\CondoUpdateCommand;
use Cygnus\Core\CygnusResponse;
use Cygnus\Forms\CondoRegistrationValidation;
use Cygnus\Repo\Condominium\CondoRepo;


/**
 * Class CondoController
 */
class CondoController extends \BaseController {


	use CygnusResponse;


	protected $condoRepository;

	protected $condoRegistrationValidation;


	/**
	 * @param CondoRegistrationValidation $condoRegistrationValidation
	 * @param CondoRepo $condoRepository
     */
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
		$input = array_add(Input::get(), 'userId', Auth::id());
		$this->condoRegistrationValidation->validate( Input::all() );
		$this->execute(CondoRegisterCommand::class, $input);
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
		$this->condoRegistrationValidation->validate( Input::all() );
		$input = array_add(Input::get(), 'condoId', $id);
		$this->execute(CondoUpdateCommand::class,$input);
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
		$input = array_add(Input::get(), 'condoId', $id);
		$this->execute(CondoDeleteCommand::class,$input);
		return $this->sendJsonMessage('success',200);
	}

}