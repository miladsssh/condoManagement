<?php
/**
 * Created by PhpStorm.
 * User: miladsssh
 * Date: 1/19/15
 * Time: 9:14 PM
 */

namespace Cygnus\Repo\Board;

use Session;

class BoardRepo {

    private $board;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function save(Board $board)
    {
        $board->save();
    }


    public function get()
    {
        $condoId = json_decode( Session::get('app.condo')[0] )->id;
        return $this->board->where( 'condominiums_id', $condoId)->get();
    }


    public function update($title, $description, $boardId)
    {
        $currentBoard = $this->getBoardById($boardId);
        $currentBoard->title = $title;
        $currentBoard->description = $description;
        $currentBoard->save();
    }

    public function delete($boardId)
    {
        $currentBoard = $this->getBoardById($boardId);
        $currentBoard->delete();
    }


    public function getBoardById($boardId) {
        return $this->board->findOrfail($boardId);
    }

}