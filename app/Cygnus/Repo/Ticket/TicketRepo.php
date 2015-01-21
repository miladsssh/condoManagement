<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 9:14 PM
 */

namespace Cygnus\Repo\Ticket;


use Cygnus\Repo\User\User;

class TicketRepo {


    /**
     * This function use in TicketRepo
     * Want to send All Ticket related to User
     *
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user) {
        return $user->ticket()->get();
    }

}