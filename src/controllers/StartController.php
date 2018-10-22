<?php

namespace trivial\controllers;

use trivial\views\StartView;

class StartController {



	public function displayStart() {

		$av = new StartView();
		echo $av->render();
	}

}
