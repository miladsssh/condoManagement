<?php

use Cygnus\Commands\Board\BoardDeleteCommand;
use Cygnus\Commands\Board\BoardRegisterCommand;
use Cygnus\Commands\Board\BoardUpdateCommand;
use Cygnus\Core\CygnusResponse;
use Cygnus\Forms\BoardRegistrationValidation;
use Cygnus\Repo\Board\BoardRepo;

class BoardController extends \BaseController {

	use CygnusResponse;

	public function __construct(BoardRepo $boardtRepository,
								BoardRegistrationValidation $boardRegistrationValidation)
	{
		$this->boardtRepository = $boardtRepository;
		$this->boardRegistrationValidation = $boardRegistrationValidation;
	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($condoId)
	{
		$board = $this->boardtRepository->get($condoId);
		return $board->toJson();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'condoId', json_decode(Session::get('app.condo')[0])->id);
		$this->boardRegistrationValidation->validate( Input::all() );
		$this->execute(BoardRegisterCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($condoId, $id)
	{
		$board = $this->boardtRepository->getBoardById($id);

		//bayad taghyeeer kone
		if(!$board->count())
			return CygnusResponse::sendJsonMessage('no result',400);
		return $board->toJson();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($condoId, $id)
	{
		$this->boardRegistrationValidation->validate( Input::all() );
		$input = array_add(Input::get(), 'boardId', $id);
		$this->execute(BoardUpdateCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($condoId, $id)
	{
		$input = array_add(Input::get(), 'boardId', $id);
		$this->execute(BoardDeleteCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}


}
