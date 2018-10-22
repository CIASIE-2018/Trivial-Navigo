<?php

namespace trivial\controllers;

use trivial\views\JoinView;
use trivial\models as m;

class JoinController {



	public function displayJoin() {
		$salonDispo =  m\Salon::all('nomSalon')->toArray();
		$av = new JoinView();
		   
		
		echo $av->render($salonDispo);
	}

}
