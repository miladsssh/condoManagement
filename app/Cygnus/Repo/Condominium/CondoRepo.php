<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/14/15
 * Time: 11:24 PM
 */

namespace Cygnus\Repo\Condominium;


use Cygnus\Repo\User\User;

/**
 * Class CondoRepo
 * @package Cygnus\Repo\Condominium
 */
class CondoRepo implements CondoRepoInterface
{

    




    /**
     * Register a New Condo
     *
     * @param Condominium $condo
     * @param $userId
     * @return mixed
     */
    public function save(Condominium $condo, $userId)
    {
        return User::findOrfail($userId)->condo()->save($condo);
    }


    /**
     * Update a Condo
     *
     * @param $name
     * @param $condoId
     */
    public function update($name, $condoId)
    {
        $currentCondo = self::getCondoById($condoId);
        $currentCondo->name = $name;
        $currentCondo->save();
    }


    /**
     * Delete a Condo
     *
     * @param $condoId
     */
    public static function delete($condoId)
    {
        $currentCondo = self::getCondoById($condoId);
        $currentCondo->user()->detach();
        $currentCondo->delete();
    }



    /**
     * This function use in CondoRepo
     * Want to send All Condo related to User
     *
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user) {
        return $user->condo()->get();
    }



    /**
     * Get Condo By Id
     *
     * @param $condoId
     * @return mixed
     */
    public static function getCondoById($condoId) {
        return Condominium::findOrfail($condoId);
    }


    public static function getCondoByName($condoName) {
        $condo = Condominium::where('name', $condoName)->first();
        if($condo ?: \App::abort(404));
        return $condo->toJson();
    }

}