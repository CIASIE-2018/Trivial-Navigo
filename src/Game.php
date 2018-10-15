<?php 
namespace trivial;

use trivial\Board;

class Game {
    private $board= array();

    public function __construct(){
        $this->board = new Board();
        $this->board->newBoard();
    }

    public function getBoard(){
        return $this->board;
    }
}
