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
      $board=json_decode($game->board,true);
      return $this->view->render($response,'GameView.html.twig',[
        'board' => $board
    ]);
    }

    public function newGame($request, $response, $args){
        $game = new Game();
        $board=new Board("pablo","rob","po","rakan");
        $game->board = json_encode($board);
        $game->idGame = $args['id'];
        $game->save();
    }
}
