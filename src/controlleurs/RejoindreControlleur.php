<?php

namespace trivial\controlleurs;

use trivial\vues\RejoindreVue;

class RejoindreControlleur {

	

	public function affichageRejoindre() {
		
		$av = new RejoindreVue();
		echo $av->render();
	}

}