<?php

namespace trivial\controlleurs;

use trivial\vues\DemarerVue;

class DemarerControlleur {

	

	public function affichageDemarer() {
		
		$av = new DemarerVue();
		echo $av->render();
	}

}