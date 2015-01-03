<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\User;


class UserRegisterCommand {

    public $email;

    public $password;

    function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

}