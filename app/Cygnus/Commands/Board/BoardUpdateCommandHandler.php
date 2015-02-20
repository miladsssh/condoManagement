<?php

/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/3/15
 * Time: 11:18 PM
 */

namespace Cygnus\Commands\Board;


use Cygnus\Repo\Board\BoardRepo;
use Laracasts\Commander\CommandHandler;

class BoardUpdateCommandHandler implements CommandHandler {


    protected $repository;

    function __construct(BoardRepo $repository)
    {
        $this->repository = $repository;
    }

    public function handle($command)
    {
        $this->repository->update($command->title, $command->description, $command->boardId);
    }

}