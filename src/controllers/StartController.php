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
		//Verifier si il y a d'autres joueurs dans le salon
		//on récpère l'id du salon sur le quel la route nous mène.
		$salon= m\Salon::where('nomSalon','=',$args);
		$salon= $salon->first();
		$idSalon = $salon->idSalon;
		
		//on récupère tous les joueurs qui ont l'idSalon que l'on vient de récupérer
		$joueur = m\Joueur::where('idSalon','=',$idSalon)->get();
		//On crée une liste pour y stocker le nom des Joueurs qui ont l'idSalon
		$listeJoueur=array();
		foreach($joueur as $nomJoueur){
			$joueurSalon= $nomJoueur->pseudoJoueur;
			array_push($listeJoueur,$joueurSalon);
			
		}
		echo $av->render($args,$listeJoueur);
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
