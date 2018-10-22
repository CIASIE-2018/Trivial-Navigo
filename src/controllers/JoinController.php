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

	public function testJoinSaloon(){
		$nomSalon = $_POST['nomSalon'];
		
		self::joinSaloon($nomSalon);
	}

	public static function joinSaloon($nomSalon){
	
		global $app ;

        $url =  $app->getContainer()->get('router')->pathFor('Saloon',[
			'name' => $nomSalon
		]);
  
        header("Location: $url");
        exit();
	}

}
