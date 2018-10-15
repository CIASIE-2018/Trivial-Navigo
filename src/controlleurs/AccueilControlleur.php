<?php

namespace trivial\controlleurs;

use trivial\vues\AccueilVue;
use trivial\modeles as m;

class AccueilControlleur {

	

	public function affichageAcc() {
		$av = new AccueilVue();
		echo $av->render();
	}

	public function supprimer($id){		
		$r = m\Joueur::find($id->getParam('id')) ;
		$r->delete();

	}

}