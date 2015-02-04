<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/4/15
 * Time: 7:21 PM
 */

namespace Cygnus\Commands\Ticket;


class TicketReplyCommand {

    public $userId;

    public $condoId;

    public $batchId;

    public $description;

    public function __construct($condoId, $userId, $batchId, $description){
        $this->description = $description;
        $this->condoId = $condoId;
        $this->userId = $userId;
        $this->batchId = $batchId;
    }


}

