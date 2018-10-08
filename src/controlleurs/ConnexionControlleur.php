<?php

namespace trivial\controlleurs;

use trivial\vues\ConnexionVue;

class ConnexionControlleur {

	

	public function affichageConnexion() {
		
		$av = new ConnexionVue();
		echo $av->render();
	}

}