<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/14/15
 * Time: 11:24 PM
 */

namespace Cygnus\Repo\Condominium;


use Cygnus\Repo\User\User;

class CondoRepo implements CondoRepoInterface
{

    /**
     * @param Condominium $condo
     * @param $userId
     * @return mixed
     */
    public function save(Condominium $condo, $userId)
    {
        return User::findOrfail($userId)->condo()->save($condo);
    }


    public function update(Condominium $condo, $condoId)
    {
        dd($condo->findOrfail($condoId));
    }

    /**
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user) {
        return $user->condo()->get();
    }

    /**
     * @param $condoId
     * @return mixed
     */
    public static function getCondoById($condoId) {
        return Condominium::findOrfail($condoId);
    }

}