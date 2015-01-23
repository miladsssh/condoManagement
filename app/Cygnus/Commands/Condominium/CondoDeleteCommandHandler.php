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

class CondoDeleteCommandHandler implements CommandHandler {

    /**
     * @var CondoRepo
     */
    protected $repository;


    /**
     * @param CondoRepo $repository
     */
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
        $this->repository->delete($command->condoId);
    }

}