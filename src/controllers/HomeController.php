<?php

namespace trivial\controllers;

use trivial\models as m;
use trivial\controllers\Authentication;
use \Slim\Views\Twig as twig;
use trivial\views\HomeView;

/**
 * Class HomeController
 */
class HomeController {

	protected $view;

	/**
	 * Constructor of the class HomeController
	 * @param view
	 */
    public function __construct(twig $view) {
        $this->view = $view;
    }

	/**
	 * Method that displays the home
	 * @param request
	 * @param response
	 * @param args
	 */
	public function displayHome($request, $response, $args) {
		if (Authentication::checkConnection()) {
			$pseudo = "Bienvenue ".$_SESSION['pseudoPlayer'];
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response, 'HomeView.html.twig', [
			'pseudo' => $pseudo,
		]);
	}

}