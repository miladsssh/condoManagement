<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/4/15
 * Time: 7:30 PM
 */

namespace Cygnus\Commands\Ticket;


use Cygnus\Repo\Ticket\Ticket;
use Cygnus\Repo\Ticket\TicketRepo;
use Laracasts\Commander\CommandHandler;

class TicketReplyCommandHandler implements CommandHandler {

    /**
     * @var CondoRepo
     */
    protected $repository;


    /**
     * @param TicketRepo $repository
     */
    function __construct(TicketRepo $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $ticket = Ticket::register('',
            $command->userId,
            $command->condoId,
            $command->batchId,
            $command->description);
        $this->repository->save($ticket);
        return $ticket;
    }

}


