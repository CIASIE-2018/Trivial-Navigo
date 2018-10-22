<?php

namespace trivial\controllers;

use trivial\views\StartView;
use trivial\models as m;


class StartController {



	public function displayStart() {

		$av = new StartView();
		echo $av->render();
	}



	public function testCreateSaloon(){
		$mode = $_POST['mode'] ;
		$saloon = $_POST['salon'] ;
		
		//mode devient un integer pour respecter la structure de la BDD
		if($mode == "Privé"){
			$mode = 1;
		}
		else{
			$mode = 0;
		}
		
		self::createSaloon($mode,$saloon);
	}

	public static function createSaloon($mode,$saloon){
		$salon = new m\Salon();

		$salon->nomSalon = $saloon;
		$salon->visible = $mode;
		
		$salon->save();
	}

}
