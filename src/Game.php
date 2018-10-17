<?php 
namespace trivial;

use trivial\Board;

class Game {
    public $board= array();

    public function __construct(){
        $this->board = new Board();
        $this->board->newBoard();
    }
}
