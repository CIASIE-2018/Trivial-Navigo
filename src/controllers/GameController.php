<?php

namespace trivial\controllers;

use trivial\views\GameView;
use trivial\models\Game;
use trivial\Board;
use \Slim\Views\Twig as twig;

class GameController{
    protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }
    public function renderBoard($request, $response, $args) {
        $idGame=$args["id"];
      $game = Game::find($idGame);
      $board=new Board();
      return $this->view->render($response,'GameView.html.twig',[
        'board' => $board
    ]);
    }

    public function newGame($request, $response, $args){
        $user = new Game();
        $board=new Board();
        $user->board = json_encode($board->grid);
        $user->idGame = $args['id'];
        $user->save();
    }
}
