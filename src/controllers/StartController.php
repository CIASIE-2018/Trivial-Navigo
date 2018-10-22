<?php

namespace trivial\controllers;

use trivial\views\StartView;
use trivial\views\SaloonView;
use trivial\models as m;


class StartController {



	public function displayStart() {

		$av = new StartView();
		echo $av->render();
	}

	public function displaySaloon(){
		$av = new SaloonView();
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
		setcookie('salon', $saloon, time() + 365*24*3600, null, null, false, true);
		global $app ;

        $url =  $app->getContainer()->get('router')->pathFor('Saloon',[
			'name' => $saloon
		]);
  
        header("Location: $url");
        exit();
	}

	public static function createSaloon($mode,$saloon){
		$salon = new m\Salon();

		$salon->nomSalon = $saloon;
		$salon->visible = $mode;
		
		$salon->save();
	}

}
