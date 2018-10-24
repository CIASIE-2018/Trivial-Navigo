<?php

namespace trivial\controllers;

use trivial\views\StartView;
use trivial\views\SaloonView;
use trivial\models as m;
use trivial\controllers\JoinController;


class StartController {



	public function displayStart() {

		$av = new StartView();
		echo $av->render();
	}

	public function displaySaloon($args){
		$av = new SaloonView();
		echo $av->render($args);
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
		//Création du salon
		$salon = new m\Salon();

		$salon->nomSalon = $saloon;
		$salon->visible = $mode;
		
		$salon->save();
		// L'idSalon de la table Salon se synchronise avec l'idSalon de la table Joueur
		$salon= m\Salon::where('nomSalon','=',$saloon);
		$salon= $salon->first();
		$idSalon = $salon->idSalon;
		$idJoueur = $_SESSION['idJoueur'];
		//La synchronisation se fait à travers la méthode joinSaloon.
		//Ainsi un joueur qui crée un salon n'est ni plus ni moins qu'un
		//joueur qui rejoint un salon, sauf que dans ce cas, le salon 
		//vient d'être crée.
		JoinController::joinSaloon($saloon,$idSalon,$idJoueur);
	}

}
