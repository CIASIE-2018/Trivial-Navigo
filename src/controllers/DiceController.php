<?php

namespace trivial\controllers;

use trivial\views\DiceView;

class DiceController {

	public function displayDice(){

		$av = new DiceView();
		echo $av->render();
	}

}
