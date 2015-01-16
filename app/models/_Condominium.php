<?php

class   Condominium extends Eloquent {


    //protected $fillable = array('email', 'password','first_name','last_name','country','address','city');

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'condominiums';


    public static function register($email,$password) {
        $user = new static(compact('email','password'));
        return $user;
        //raise event
    }


}
