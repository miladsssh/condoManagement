<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Condominium;

class CondoDeleteCommand {


    /**
     * @var
     */
    public $condoId;

    /**
     * @param $condoId
     */
    function __construct($condoId)
    {
        $this->condoId = $condoId;
    }

}