<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 21:35 PM
 */

namespace Cygnus\Commands\Board;

class BoardRegisterCommand {


    public $title;

    public $condoId;

    public $description;


    /**
     * @param $title
     * @param $userId
     */
    public function __construct($title, $description, $condoId)
    {
        $this->title = $title;
        $this->condoId = $condoId;
        $this->description = $description;
    }

}