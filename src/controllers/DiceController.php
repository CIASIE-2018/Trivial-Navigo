<?php

namespace trivial\controllers;

use \Slim\Views\Twig as twig;
use trivial\views\DiceView;

/**
 * Class DiceController
 */
class DiceController {

	protected $view;
	
	/**
	 * Constructor of the class DiceController
	 * @param view
	 */
	public function __construct(twig $view) {
        $this->view = $view;
	}
	
	/**
	 * Method that displays a dice
	 * @param request
	 * @param response
	 * @param args
	 */
	public function displayDice($request, $response, $args){
		return $this->view->render($response, 'DiceView.html.twig', []);
	}

}