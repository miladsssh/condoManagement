<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Condominium;


use Cygnus\Repo\Condominium\Condominium;
use Cygnus\Repo\Condominium\CondoRepo;
use Laracasts\Commander\CommandHandler;

class CondoUpdateCommandHandler implements CommandHandler {

    protected $repository;


    function __construct(CondoRepo $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command
     *
     * @param $command
     * @return mixed
     */
    public function handle($command)
    {
        $condo = Condominium::register($command->name);
        $this->repository->update($condo, $command->id);
        return $condo;
    }

}