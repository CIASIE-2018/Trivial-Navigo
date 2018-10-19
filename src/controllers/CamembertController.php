<?php

namespace trivial\controllers;

use trivial\views\CamembertView;

class CamembertController {

	public function displayCamembert(){

		$av = new CamembertView();
		echo $av->render();
	}

}
