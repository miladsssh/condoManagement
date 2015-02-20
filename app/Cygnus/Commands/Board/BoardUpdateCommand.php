<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Board;

class BoardUpdateCommand {


    public $title;

    public $description;

    public $boardId;

    function __construct($title, $description, $boardId)
    {
        $this->title = $title;
        $this->description = $description;
        $this->boardId = $boardId;
    }

}