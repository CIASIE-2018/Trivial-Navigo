<?php

namespace trivial\controllers;

use trivial\views\DiceView;
use \Slim\Views\Twig as twig;

class DiceController {
	protected $view;
	
	public function __construct(twig $view) {
        $this->view = $view;
    }
	public function displayDice($request, $response, $args){

		return $this->view->render($response,'DiceView.html.twig',[]);
	}

}
