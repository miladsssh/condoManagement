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

    public $batchId;

    public $description;


    /**
     * @param $title
     * @param $userId
     */
    public function __construct($title, $userId, $condoId, $batchId, $description)
    {
        $this->title = $title;
        $this->userId = $userId;
        $this->condoId = $condoId;
        $this->batchId = $batchId;
        $this->description = $description;
    }

}