<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Condominium;


/**
 * Class CondoRegisterCommand
 * @package Cygnus\Commands\Condominium
 */
class CondoRegisterCommand {

    /**
     * @var
     */
    public $name;

    /**
     * @var
     */
    public $userId;

    /**
     * @param $name
     * @param $userId
     */
    function __construct($name, $userId)
    {
        $this->name = $name;
        $this->userId = $userId;
    }

}