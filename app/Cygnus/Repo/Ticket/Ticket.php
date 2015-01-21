<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 9:12 PM
 */
namespace Cygnus\Repo\Ticket;

use Eloquent;

class Ticket extends Eloquent{

    protected  $fillable = ['title'];

    protected $table = 'tickets';
    
}