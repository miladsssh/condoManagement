<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Condominium;

class CondoUpdateCommand {


    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $condoId;

    /**
     * @param $name
     * @param $condoId
     */
    function __construct($name, $condoId)
    {
        $this->condoId = $condoId;
        $this->name = $name;
    }

}