<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/14/15
 * Time: 8:06 PM
 */

namespace Cygnus\Core;


trait CygnusResponse {

    /**
     *
     * @param $httpMessage
     * @param $httpStatus
     * @return mixed
     */
    public static function sendJsonMessage($httpMessage, $httpStatus)
    {
        //$httpMessage would be a string or array
        //masoud havaset bashe

        if($httpStatus==200)
            $httpMessage = 'The Operation is Successfully Done.';

        $jsonMessage['message'] = $httpMessage;
        return \Response::json($jsonMessage, $httpStatus);
    }
}