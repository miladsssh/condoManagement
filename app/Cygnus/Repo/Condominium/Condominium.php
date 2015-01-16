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

    protected $table = 'condominiums';


    /**
     * @return mixed
     */
    public function user()
    {
        return $this->blongsToMany('Cygnus\Repo\User\User','user_condominiums');
    }

    /**
     * @param $title
     * @return static
     */
    public static function register($name) {
        $condo = new static(compact('name'));
        return $condo;
        //raise event
    }


    
}