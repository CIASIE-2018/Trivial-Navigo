<?php

namespace trivial\controllers;

use trivial\views\ConnexionView;
use \Slim\Views\Twig as twig;
use trivial\views\CreateAccountView;
use trivial\models as m;
use trivial\controllers\Authentication;

class ConnexionController {

	protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }

	public function displayConnexion($request,$response,$args) {

		if( Authentication::verificationConnexion() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		return $this->view->render($response,'ConnexionView.html.twig',[
			'pseudo'=>$pseudo,
		]);
	}

	public function createAccount($request,$response,$args) {
		return $this->view->render($response,'CreateAccountView.html.twig',[]);
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
