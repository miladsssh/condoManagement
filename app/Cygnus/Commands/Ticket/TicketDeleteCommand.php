<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Ticket;

class TicketDeleteCommand {


    /**
     * @var
     */
    public $ticketId;

    /**
     * @param $ticketId
     */
    function __construct($ticketId)
    {
        $this->ticketId = $ticketId;
    }

}