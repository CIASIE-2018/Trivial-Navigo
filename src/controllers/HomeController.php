<?php

namespace trivial\controllers;

use trivial\views\HomeView;
use trivial\controllers\Autentication;
use trivial\models as m;
use \Slim\Views\Twig as twig;


class HomeController {

	protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }

	public function displayHome($request,$response,$args) {
		if( Authentication::checkConnection() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		return $this->view->render($response,'HomeView.html.twig',[
			'pseudo'=>$pseudo,
		]);
		}
	

	public function remove($id){
		$r = m\Joueur::find($id->getParam('id')) ;
		$r->delete();

	}

}
