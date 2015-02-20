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



    public function save(Ticket $ticket)
    {
        $ticket->save();
        return $ticket->id;
    }



    public static function delete($ticketId)
    {
        $currentTicket = self::getTicketById($ticketId);;
        $currentTicket->delete();
    }

    /**
     * This function use in TicketRepo
     * Want to send All Ticket related to User
     *
     * @param User $user
     * @return mixed
     */
    public static function getAllForUser(User $user) {
        return $user->ticket()->groupby('batch_id')->get();
    }


    public static function getTicketById($ticketId) {
        return Ticket::findOrfail($ticketId);
    }

    public static function getTicketByBatchId($ticketBatchId) {
        return Ticket::where('batch_id', '=', $ticketBatchId)->orderBy('id','desc')->with('user', 'attachment')->get();
    }


}