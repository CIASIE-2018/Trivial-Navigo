<?php

namespace trivial\controlleurs;

use trivial\vues\JeuVue;
use trivial\Jeu;

class JeuControlleur {
    private $jeu;

    public function initJeu(){
        $this->jeu = new Jeu();
    }
	public function affichageJeu() {
		$av = new JeuVue();
		echo $av->render($this->jeu);
	}

}