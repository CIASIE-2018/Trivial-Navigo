<?php

namespace trivial\controllers;

use trivial\views\JoinView;
use trivial\models as m;
use \Slim\Views\Twig as twig;
use trivial\controllers\Autentication;


class JoinController {

	protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }


	public function displayJoin($request,$response,$args) {
		$salonDispo =  m\Salon::all('nomSalon')->toArray();
		if( Authentication::verificationConnexion() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		
		return $this->view->render($response,'JoinView.html.twig',[
			'pseudo'=>$pseudo,
			'salonDispo'=>$salonDispo,
		]);
	}
	

	public function testJoinSaloon(){
		$nomSalon = $_POST['nomSalon'];
		//Id du joueur permettra de modifier l'idSalon de ce joueur en base
		$idJoueur = $_SESSION['idJoueur'];
		
		//récupère l'id du salon qui correspond au nom du salon.
		$salon= m\Salon::where('nomSalon','=',$nomSalon);
		$salon= $salon->first();
		$idSalon = $salon->idSalon;
		self::joinSaloon($nomSalon,$idSalon,$idJoueur);
	}

	public static function joinSaloon($nomSalon,$idSalon,$idJoueur){
	
		$joueur =m\Joueur::find($idJoueur);
		if($joueur){
		$joueur->idSalon = $idSalon;
		$joueur->save();
		}
		
		global $app ;

        $url =  $app->getContainer()->get('router')->pathFor('Saloon',[
			'name' => $nomSalon
		]);
  
        header("Location: $url");
        exit();
	}

}
