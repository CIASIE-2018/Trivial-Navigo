<?php

namespace trivial\controllers;

use trivial\views\GameView;
use trivial\Game;
use \Slim\Views\Twig as twig;

class GameController{
    protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }
    public function renderNewBoard($request, $response, $args) {
      $game = new Game();
      return $this->view->render($response,'GameView.html.twig',[
        'board' => $game->board
    ]);

    }

}
