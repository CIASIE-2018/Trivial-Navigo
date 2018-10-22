<?php

namespace trivial\controllers;

use trivial\views\ConnexionView;
use trivial\views\CreateAccountView;
use trivial\models as m;
use trivial\controllers\Authentication;

class ConnexionController {



	public function displayConnexion() {

		$av = new ConnexionView();
		echo $av->render();
	}

	public function CreateAccountView() {
		$av = new CreateAccountView();
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
		//Fonction de hashage du mot de passe
		$mdp=password_hash($_POST['mdp'], PASSWORD_DEFAULT , ['cost'=>12]);
		
		self::creer($pseudo,$mdp,$email);
			
	  global $app ;
      $url =  $app->getContainer()->get('router')->pathFor('Accueil');

      header("Location: $url");
      exit();
	}

	

	public static function testConnexion(){
		$email=$_POST['email'] ;
		$mdp=$_POST['mdp'];
		$nb = m\Joueur::where('adresseMail', '=',$email);
		if($nb->count() != 1){
			echo "email invalide" ;
		  }
		  else{
			  
			if (password_verify($mdp,$nb->first()->password)) {
			  $nb = $nb->first();
			  Authentication::connexion($nb->idJoueur , $nb->pseudoJoueur) ;
			  global $app ;

			  $url =  $app->getContainer()->get('router')->pathFor('Accueil');
		
			  header("Location: $url");
			  exit();
			}
			else{
			  echo "mot de passe invalide";
			}
		  }

		  
	}
	public static function testDeconnexion(){
		
		Authentication::deconnexion();
		global $app ;

		  $url =  $app->getContainer()->get('router')->pathFor('Accueil');
	
		  header("Location: $url");
		  exit();
	
	  }
}
