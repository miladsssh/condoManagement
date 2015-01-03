<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 8:41 PM
 */

namespace Cygnus\Forms;


use Laracasts\Validation\FormValidator;

class UserRegistrationValidation extends FormValidator {

    protected $rules = [
        'email'  => 'required|unique:users',
        'password' => 'required|confirmed'
    ];

}