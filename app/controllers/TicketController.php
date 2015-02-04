<?php

use Cygnus\Commands\Ticket\TicketDeleteCommand;
use Cygnus\Commands\Ticket\TicketRegisterCommand;
use Cygnus\Commands\Ticket\TicketReplyCommand;
use Cygnus\Core\CygnusResponse;
use Cygnus\Forms\TicketRegistrationValidation;
use Cygnus\Forms\TicketReplyValidation;
use Cygnus\Repo\Ticket\TicketRepo;

class TicketController extends \BaseController {


	use CygnusResponse;

	protected $ticketRepository;

	protected $ticketRegistrationValidation;

	protected $ticketReplyValidation;

	function __construct(TicketRepo $ticketRepository,
						 TicketRegistrationValidation $ticketRegistrationValidation,
						 TicketReplyValidation $ticketReplyValidation)
	{
		$this->ticketRegistrationValidation = $ticketRegistrationValidation;
		$this->ticketRepository = $ticketRepository;
		$this->ticketReplyValidation = $ticketReplyValidation;
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
		$condoId = json_decode(Session::get('app.condo')[0])->id;
		$batchId = Str::random(20);
		$input = array_add(Input::get(), 'userId', Auth::id());
		$input = array_add($input, 'condoId', $condoId);
		$input = array_add($input, 'batchId', $batchId);
		$this->ticketRegistrationValidation->validate( Input::all() );
		$this->execute(TicketRegisterCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}


	public function replyTicket()
	{
		$input = array_add(Input::get(), 'userId', Auth::id());
		$input = array_add($input, 'condoId', json_decode(Session::get('app.condo')[0])->id);
		$this->ticketReplyValidation->validate( Input::all() );
		$this->execute(TicketReplyCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}

	/**
	 * Display the specified resource.
	 * GET /ticket/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($condoName ,$batchId)
	{
		$ticket = $this->ticketRepository->getTicketByBatchId($batchId);

		//bayad taghyeeer kone
		if(!$ticket->count())
			return CygnusResponse::sendJsonMessage('no result',400);
		return $ticket->toJson();
	}


	/**
	 * Remove the specified resource from storage.
	 * DELETE /ticket/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($condoName, $id)
	{
		$input = array_add(Input::get(), 'ticketId', $id);
		$this->execute(TicketDeleteCommand::class, $input);
		return $this->sendJsonMessage('success',200);
	}

}