<?php

namespace Cygnus\Repo\User;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Eloquent,Hash;


class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $fillable = array('email', 'password','first_name','last_name','country','address','city');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	/**
	 * @param $password
     */
	protected function setPasswordAttribute($password) {
		$this->attributes['password'] = Hash::make($password);
	}


	/**
	 * The Relation is Many To Many
	 * Each User can have many condo
	 *
	 * @return mixed
     */
	public function condo(){
		return $this->belongsToMany('Cygnus\Repo\Condominium\Condominium','user_condominiums');
	}


	/**
	 *This function make a new Object of Eloquent
	 *
	 * @param $email
	 * @param $password
	 * @return static
     */
	public static function register($email,$password) {
		$user = new static(compact('email','password'));
		return $user;
		//raise event
	}


}
