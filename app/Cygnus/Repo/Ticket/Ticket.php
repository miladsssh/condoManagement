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

    protected  $fillable = ['title','user_id','condominiums_id', 'batch_id'];

    protected $table = 'tickets';


    public static function register($title, $user_id, $condominiums_id, $batch_id) {
        $ticket = new static(compact('title','user_id', 'condominiums_id', 'batch_id'));
        return $ticket;
        //raise event
    }
    
}