<?php

namespace trivial\controllers;

use trivial\views\ConnexionView;

class ConnexionController {



	public function displayConnexion() {

		$av = new ConnexionView();
		echo $av->render();
	}

}
