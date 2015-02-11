<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 21:35 PM
 */

namespace Cygnus\Commands\Ticket;


use Cygnus\Repo\Ticket\Ticket;
use Cygnus\Repo\Ticket\TicketRepo;
use Laracasts\Commander\CommandHandler;

class TicketRegisterCommandHandler implements CommandHandler {



    protected $repository;






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
        $ticket = Ticket::register( $command->title,
                                    $command->userId,
                                    $command->condoId,
                                    $command->batchId,
                                    $command->description);
        return $this->repository->save($ticket);
    }

}