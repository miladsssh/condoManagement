<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:25 PM
 */

namespace Cygnus\Commands\Condominium;

use Cygnus\Repo\Condominium\Condominium;
use Cygnus\Repo\Condominium\CondoRepo;
use Laracasts\Commander\CommandHandler;


/**
 * Class CondoRegisterCommandHandler
 * @package Cygnus\Commands\Condominium
 */
class CondoRegisterCommandHandler implements CommandHandler{

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
		$condo = Condominium::register($command->name);
        $this->repository->save($condo, $command->userId);
        return $condo;
    }

}