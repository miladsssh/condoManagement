<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/18/15
 * Time: 11:34 AM
 */
namespace Cygnus\Repo\Condominium;

use Cygnus\Repo\User\User;

/**
 * Interface CondoRepoInterface
 * @package Cygnus\Repo\Condominium
 */
interface CondoRepoInterface
{
    /**
     * Register a New Condo
     *
     * @param Condominium $condo
     * @param $userId
     * @return mixed
     */
    public function save(Condominium $condo, $userId);

    /**
     * Update a Condo
     *
     * @param $name
     * @param $condoId
     */
    public function update($name, $condoId);

    /**
     * Delete a Condo
     *
     * @param $condoId
     */
    public static function delete($condoId);

    /**
     * This function use in CondoRepo
     * Want to send All Condo related to User
     *
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user);

    /**
     * Get Condo By Id
     *
     * @param $condoId
     * @return mixed
     */
    public static function getCondoById($condoId);
}