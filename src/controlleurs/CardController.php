<?php

namespace trivial\controlleurs;

use trivial\modeles as m;
use trivial\vues\CardView;

class CardController {

    private $cards;

    /*public function listCards() {
        $this->cards = m\Carte::select('idCarte')->get();
        $this->theme = m\Carte::select('idTheme')/*->where('idCarte', '=', $idCard)->get();
        $cardView = new CardView();
        echo $cardView->renderRandomListCards($this->cards, $this->theme);
    }*/

    public function listCardsGeo() {
        $this->cards = m\Carte::select('idCarte', 'question', 'reponse')->where('idTheme', '=', 1)->get();
        $cardView = new CardView();
        echo $cardView->renderRandomListCardsGeo($this->cards);
    }

    
}