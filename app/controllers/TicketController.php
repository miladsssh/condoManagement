<?php

use Cygnus\Commands\Ticket\TicketDeleteCommand;
use Cygnus\Commands\Ticket\TicketRegisterCommand;
use Cygnus\Core\CygnusResponse;
use Cygnus\Forms\TicketRegistrationValidation;
use Cygnus\Repo\Ticket\TicketRepo;

class TicketController extends \BaseController {


	use CygnusResponse;

	protected $ticketRepository;

	protected $ticketRegistrationValidation;

	function __construct(TicketRepo $ticketRepository,TicketRegistrationValidation $ticketRegistrationValidation)
	{
		$this->ticketRegistrationValidation = $ticketRegistrationValidation;
		$this->ticketRepository = $ticketRepository;
	}

	/**
	 * Display a listing of the resource.
	 * GET /ticket
	 *
	 * @return Response
	 */
	public function index()
	{
		$ticket = $this->ticketRepository->getAllForUser(Auth::user());
		return $ticket->toJson();
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /ticket/create
	 *
	 * @return Response
	 */
	public function create()
	{
		dd('create a new ticket');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /ticket
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());
		$input = array_add($input, 'condoId', '6');
		$input = array_add($input, 'batchId', '1');
		$this->ticketRegistrationValidation->validate( Input::all() );
		$this->execute(TicketRegisterCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}

	/**
	 * Display the specified resource.
	 * GET /ticket/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		dd('show just one ticket');
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /ticket/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$input = array_add(Input::get(), 'ticketId', $id);
		$this->execute(TicketDeleteCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}

}