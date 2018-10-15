<?php

namespace trivial\controlleurs;

use trivial\vues\CreateAccountVue;
use trivial\vues\ConnexionVue;
use trivial\modeles as m;

class ConnexionControlleur {

	

	public function CreateAccountAffichage() {
		$av = new CreateAccountVue();
		echo $av->render();
	}

	public static function creer($pseudo , $mdp , $email){

		$r = new m\Joueur() ;
	
		//Paramètres provenant du formulaire
		$r->pseudoJoueur = $pseudo ;
		$r->adresseMail = $email ;
		$r->password = $mdp ;

		
		$r->save();
	
	}

	public static function testCreationAccount(){

		$pseudo = $_POST['pseudo'] ;
		$mdp = $_POST['mdp'] ;
		$email = $_POST['email'] ;
	  
		
		self::creer($pseudo,$mdp,$email);
		var_dump("ici");	
	
	  
	  global $app ;
      $url =  $app->getContainer()->get('router')->pathFor('Accueil');

      header("Location: $url");
      exit();
	}

	public function affichageConnexion(){
		$av = new ConnexionVue();
		echo $av->render();
	}

}