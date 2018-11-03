<?php

namespace trivial\controllers;

use trivial\models as m;
use trivial\controllers\Authentication;
use \Slim\Views\Twig as twig;
use trivial\views\JoinView;

/**
 * Class JoinController
 */
class JoinController {

	protected $view;

	/**
	 * Constructor of the class JoinController
	 * @param view
	 */
    public function __construct(twig $view) {
        $this->view = $view;
    }

	/**
	 * Method that displays the page to join a saloon
	 * @param request
	 * @param response
	 * @param args
	 */
	public function displayJoin($request, $response, $args) {
		$saloonAvailable = m\Salon::all()->where('visible', '=', '0')->toArray();
		if (Authentication::checkConnection()) {
			$pseudo = "Bienvenue ".$_SESSION['pseudoPlayer'];
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response, 'JoinView.html.twig', [
			'pseudo' => $pseudo,
			'salonDispo' => $saloonAvailable,
		]);
	}
	
	/**
	 * Method that checks the rejoignement of a player in a saloon
	 * @param request
	 * @param response
	 * @param args
	 */
	public function checkJoinSaloon($request, $response, $args){
		$nameSaloon = $args['name'];
		$idPlayer = $_SESSION['idPlayer'];
		$saloon = m\Salon::where('nomSalon', '=', $nameSaloon);
		$saloonF = $salon->first();
		$idSaloon = $saloonF->idSalon;
		self::joinSaloon($nameSaloon, $idSaloon, $idPlayer);
	}

	/**
	 * Method which allows to join a saloon
	 * @param nameSaloon
	 * @param idSaloon
	 * @param idPlayer
	 */
	public static function joinSaloon($nameSaloon, $idSaloon, $idPlayer){
		$player = m\Joueur::find($idPlayer);
		if ($player) {
			$player->idSalon = $idSaloon;
			$player->save();
		}
	}

}