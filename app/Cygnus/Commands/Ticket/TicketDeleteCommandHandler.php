<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Ticket;


use Cygnus\Repo\Ticket\Ticket;
use Cygnus\Repo\Ticket\TicketRepo;
use Laracasts\Commander\CommandHandler;

class TicketDeleteCommandHandler implements CommandHandler {

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
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $this->repository->delete($command->ticketId);
    }

}