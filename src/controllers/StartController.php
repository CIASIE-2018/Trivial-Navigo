<?php

namespace trivial\controllers;

use trivial\views\StartView;
use trivial\views\SaloonView;
use trivial\models as m;
use trivial\controllers\JoinController;
use trivial\controllers\Autentication;
use \Slim\Views\Twig as twig;

class StartController {

	protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }


	public function displayStart($request,$response,$args) {
		if( Authentication::verificationConnexion() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		return $this->view->render($response,'StartView.html.twig',[
			'pseudo'=>$pseudo,
		]);
		}

	public function displaySaloon($request,$response,$args){
		if( Authentication::verificationConnexion() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		$nameSaloon=$args['name'];
		
		//Verifier si il y a d'autres joueurs dans le salon
		//on récpère l'id du salon sur le quel la route nous mène.
		$salon= m\Salon::where('nomSalon','=',$nameSaloon);
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
		
		return $this->view->render($response,'SaloonView.html.twig',[
			'pseudo'=>$pseudo,
			'nameSaloon'=>$nameSaloon,
			'joueurSalon'=>$joueurSalon,
			'listeJoueur'=>$listeJoueur,
		]);
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
