<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:59 PM
 */

namespace Cygnus\Core;

use App;

trait CommandBus {

    /**
     * Execute the Command
     *
     * @param $command
     * @return mixed
     */
    public function execute($command)
    {
        return $this->getCommandBus()->execute($command);
    }

    /**
     * Fetch the Command Bus
     *
     * @return mixed
     */
    public function getCommandBus()
    {
       return App::make('Laracasts\Commander\CommandBus');
    }


}