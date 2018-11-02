<?php

namespace trivial\controllers;

use trivial\models as m;
use trivial\controllers\Authentication;
use trivial\views\ConnexionView;
use \Slim\Views\Twig as twig;
use trivial\views\CreateAccountView;

/**
 * Class ConnectionController
 */
class ConnectionController {

	protected $view;

	/**
	 * Constructor of the class ConnectionController
	 * @param view
	 */
    public function __construct(twig $view) {
        $this->view = $view;
    }

	/**
	 * Method that displays a connection
	 * @param request
	 * @param response
	 * @param args
	 */
	public function displayConnection($request, $response, $args) {
		if(Authentication::checkConnection()) {
			$pseudo = "Bienvenue ".$_SESSION['pseudoJoueur'];
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response,'ConnexionView.html.twig',[
			'pseudo'=>$pseudo,
		]);
	}

	/**
	 * Method that displays a form for account creation
	 * @param request
	 * @param response
	 * @param args
	 */
	public function createAccount($request, $response, $args) {
		return $this->view->render($response,'CreateAccountView.html.twig',[]);
	}

	/**
	 * Method that creates a player
	 * @param pseudoPlayer
	 * @param passwordPlayer
	 * @param emailPlayer
	 */
	public static function createPlayer($pseudoPlayer, $passwordPlayer, $emailPlayer){
		$r = new m\Joueur();
		$r->pseudoJoueur = $pseudoPlayer;
		$r->adresseMail = $emailPlayer;
		$r->password = $passwordPlayer;
		$r->save();
	}

	// 
	public static function testCreationAccount() {
		$pseudo = $_POST['pseudo'];
		$mdp = $_POST['mdp'];
		$email = $_POST['email'];
		// Function that allows password hashing
		$mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT, ['cost'=>12]);
		self::createPlayer($pseudo,$mdp,$email);
	}

	//
	public static function testConnexion(){
		$email=$_POST['email'] ;
		$mdp=$_POST['mdp'];
		$nb = m\Joueur::where('adresseMail', '=',$email);
		if($nb->count() != 1){
			echo "email invalide" ;
		}
		else {	
			if (password_verify($mdp,$nb->first()->password)) {
				$nb = $nb->first();
				Authentication::instantiateSession($nb->idJoueur , $nb->pseudoJoueur) ;
				global $app ;

				$url =  $app->getContainer()->get('router')->pathFor('Home');
		
				header("Location: $url");
				exit();
			}
			else{
				echo "mot de passe invalide";
			}
		} 
	}

	public static function testdestroySession(){
		Authentication::destroySession();
		global $app ;
		$url =  $app->getContainer()->get('router')->pathFor('Home');
		header("Location: $url");
		exit();
	}

}