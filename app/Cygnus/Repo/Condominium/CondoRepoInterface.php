<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/16/15
 * Time: 7:07 PM
 */
namespace Cygnus\Repo\Condominium;

use Cygnus\Repo\User\User;

interface CondoRepoInterface
{
    /**
     * @param Condominium $condo
     * @param $userId
     * @return mixed
     */
    public function save(Condominium $condo, $userId);

    /**
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user);

    /**
     * @param $condoId
     * @return mixed
     */
    public static function getCondoById($condoId);
}