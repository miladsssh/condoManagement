<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 21:35 PM
 */

namespace Cygnus\Commands\Board;

class BoardDeleteCommand {

    public $boardId;

    function __construct($boardId)
    {
        $this->boardId = $boardId;
    }

}