<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:25 PM
 */

namespace Cygnus\Commands\User;


use Cygnus\Repo\User\User;
use Cygnus\Repo\User\UserRepo;
use Laracasts\Commander\CommandHandler;

class UserRegisterCommandHandler implements CommandHandler{

    /**
     * @var UserRepo
     */
    protected $repository;


    /**
     * @param UserRepo $repository
     */
    function __construct(UserRepo $repository)
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
		$user = User::register($command->email,$command->password);
        $this->repository->save($user);
        return $user;
    }
}