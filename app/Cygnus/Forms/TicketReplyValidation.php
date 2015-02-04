<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 2/4/15
 * Time: 7:18 PM
 */

namespace Cygnus\Forms;

use Laracasts\Validation\FormValidator;

class TicketReplyValidation extends FormValidator{
    /**
     * @var array
     */
    protected $rules = [
        'description' => 'required'
    ];
}