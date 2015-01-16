<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Condominium;

class CondoUpdateCommand {

    public $name;
    public $id;

    function __construct($id, $name)
    {
        $this->name = $name;
        $this->id = $id;
    }

}