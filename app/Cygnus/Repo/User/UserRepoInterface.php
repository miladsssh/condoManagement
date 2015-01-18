<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/4/15
 * Time: 12:17 AM
 */
namespace Cygnus\Repo\User;

interface UserRepoInterface
{
    /**
     * Register a new User
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user);
}