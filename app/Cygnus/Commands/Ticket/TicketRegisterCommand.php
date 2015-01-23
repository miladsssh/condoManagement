<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 21:35 PM
 */

namespace Cygnus\Commands\Ticket;

class TicketRegisterCommand {


    public $title;

    public $userId;

    public $condoId;


    /**
     * @param $title
     * @param $userId
     */
    public function __construct($title, $userId, $condoId)
    {
        $this->title = $title;
        $this->userId = $userId;
        $this->condoId = $condoId;
    }

}