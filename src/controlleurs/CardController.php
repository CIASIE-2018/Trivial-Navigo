<?php

namespace trivial\controlleurs;

use trivial\modeles as m;
use trivial\vues\CarteView;

class CarteControlleur {

    private $cards;

    public function listCards() {
        $this->cards = m\Carte::select('idCarte')->get();
        $cardView = new CarteVue();
		echo $cardView->renderRandomListCards($this->cards);
    }

}