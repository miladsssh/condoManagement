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
    public function save(User $user);
}