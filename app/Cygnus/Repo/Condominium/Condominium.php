<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/14/15
 * Time: 11:16 PM
 */
namespace Cygnus\Repo\Condominium;


use Eloquent;

class Condominium extends Eloquent{

    /**
     * @var array
     */
    protected  $fillable = ['name'];

    /**
     * @var string
     */
    protected $table = 'condominiums';


    /**
     * The Relation is Many To Many
     * Each Condo Belongs to Many User
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsToMany('Cygnus\Repo\User\User','user_condominiums');
    }


    /**
     *This function make a new Object of Eloquent
     *
     * @param $name
     * @return static
     * @internal param $title
     */
    public static function register($name) {
        $condo = new static(compact('name'));
        return $condo;
        //raise event
    }




    
}