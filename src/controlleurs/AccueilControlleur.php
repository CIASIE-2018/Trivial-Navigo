<?php

namespace trivial\controlleurs;

use trivial\vues\AccueilVue;

class AccueilControlleur {

	private $a = "accueil";

	public function affichageAcc() {
		$av = new AccueilVue();
		echo $av->render($this->a);
	}

}