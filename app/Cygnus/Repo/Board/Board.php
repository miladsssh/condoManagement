<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 9:12 PM
 */
namespace Cygnus\Repo\Board;

use Eloquent;

class Board extends Eloquent{

    protected  $fillable = ['title', 'description', 'condominiums_id'];

    protected $table = 'boards';


    public static function register($title, $description, $condominiums_id) {
        $board = new static(compact('title','description', 'condominiums_id'));
        return $board;
        //raise event
    }

}