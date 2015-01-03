<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:39 PM
 */

namespace Cygnus\Repo\User;


class UserRepo implements UserRepoInterface
{

    public function save(User $user){
        return $user->save();
    }
}