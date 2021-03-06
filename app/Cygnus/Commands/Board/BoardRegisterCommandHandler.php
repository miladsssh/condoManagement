<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 21:35 PM
 */

namespace Cygnus\Commands\Board;


use Cygnus\Repo\Board\Board;
use Cygnus\Repo\Board\BoardRepo;
use Laracasts\Commander\CommandHandler;

class BoardRegisterCommandHandler implements CommandHandler {



    protected $repository;


    function __construct(BoardRepo $repository)
    {
        $this->repository = $repository;
    }


    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
        $board = Board::register(   $command->title,
                                    $command->description,
                                    $command->condoId);
        return $this->repository->save($board);
    }

}