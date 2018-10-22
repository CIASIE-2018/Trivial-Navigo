<?php

namespace trivial\controllers;

use trivial\views\HomeView;
use trivial\models as m;

class HomeController {



	public function displayHome() {
		$av = new HomeView();
		echo $av->render();
	}

	public function remove($id){
		$r = m\Joueur::find($id->getParam('id')) ;
		$r->delete();

	}

}
