<?php

namespace trivial\controllers;

use trivial\views\CamembertView;
use \Slim\Views\Twig as twig;

class CamembertController {
	protected $view;
	
	public function __construct(twig $view) {
        $this->view = $view;
    }

	public function displayCamembert($request, $response, $args){

		return $this->view->render($response,'CamembertView.html.twig',[]);
	}

}
