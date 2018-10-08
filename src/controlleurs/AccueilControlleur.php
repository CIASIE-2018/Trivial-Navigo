<?php

namespace trivial\controlleurs;

use trivial\vues\AccueilVue;

class AccueilControlleur {

	

	public function affichageAcc() {
		$av = new AccueilVue();
		echo $av->render();
	}

}