<?php

namespace trivial\controllers;

use trivial\views\JoinView;

class JoinController {



	public function displayJoin() {

		$av = new JoinView();
		echo $av->render();
	}

}
