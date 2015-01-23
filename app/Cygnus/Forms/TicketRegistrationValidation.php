<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/22/15
 * Time: 7:47 PM
 */

namespace Cygnus\Forms;


use Laracasts\Validation\FormValidator;

class TicketRegistrationValidation extends FormValidator{
    /**
     * @var array
     */
    protected $rules = [
        'title'  => 'required',
    ];
}