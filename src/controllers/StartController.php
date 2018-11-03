<?php

namespace trivial\controllers;

use trivial\models as m;
use trivial\controllers\JoinController;
use trivial\controllers\Authentication;
use \Slim\Views\Twig as twig;
use trivial\views\StartView;
use trivial\views\SaloonView;

/**
 * Class StartController
 */
class StartController {

	protected $view;

	/**
	 * Constructor of the class StartController
	 * @param view
	 */
    public function __construct(twig $view) {
        $this->view = $view;
    }

	public function displayStart($request, $response, $args) {
		if (Authentication::checkConnection()) {
			$pseudo = "Bienvenue ".$_SESSION['pseudoPlayer'] ;
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response, 'StartView.html.twig', [
			'pseudo' => $pseudo,
		]);
	}

	/**
	 * Method that displays a saloon
	 * @param request
	 * @param response
	 * @param args
	 */
	public function displaySaloon($request, $response, $args){
		if (Authentication::checkConnection()) {
			$pseudo = $_SESSION['pseudoPlayer'];
		}
		else {
			$pseudo = "";
		}
		$nameSaloon = $args['name'];
		$saloon = m\Salon::where('nomSalon', '=', $nameSaloon);
		$salonF = $saloon->first();
		$idSaloon = $salonF->idSalon;
		$player = m\Joueur::where('idSalon', '=', $idSaloon)->get();
		$listPlayers = array();
		foreach($player as $namePlayer) {
			$playerSaloon = $namePlayer->pseudoJoueur;
			if (count($listPlayers) <= 4) {
				array_push($listPlayers, $playerSaloon);
			}
		}
		$game= m\Game::find($nameSaloon);
		header("Refresh:2");
		return $this->view->render($response, 'SaloonView.html.twig', [
			'gameExist' => $salon = (isset($game)),
			'pseudo' => $pseudo,
			'nameSaloon' => $nameSaloon,
			'listeJoueur' => $listPlayers,
		]);
	}

	// Method that checks the creation of a saloon
	public function checkCreateSaloon(){
        $mode = $_POST['mode'] ;
        $saloon = $_POST['salon'] ;
        if($mode == "Privé"){
            $mode = 1;
        }
        else {
            $mode = 0;
        }
        self::createSaloon($mode, $saloon);
    }

	/**
	 * Method that creates a saloon
	 * @param modeSaloon
	 * @param nameSaloon
	 */
	public static function createSaloon($modeSaloon, $nameSaloon){
		$saloonNew = new m\Salon();
		$saloonNew->nomSalon = $nameSaloon;
		$saloonNew->visible = $modeSaloon;
		$saloonNew->save();
		// L'idSalon de la table Salon se synchronise avec l'idSalon de la table Joueur
		$saloon = m\Salon::where('nomSalon', '=', $nameSaloon);
		$saloonF = $saloon->first();
		$idSaloon = $saloonF->idSalon;
		$idPlayer = $_SESSION['idPlayer'];
		//La synchronisation se fait à travers la méthode joinSaloon.
		//Ainsi un joueur qui crée un salon n'est ni plus ni moins qu'un
		//joueur qui rejoint un salon, sauf que dans ce cas, le salon 
		//vient d'être crée.
		JoinController::joinSaloon($nameSaloon, $idSaloon, $idPlayer);
	}

}