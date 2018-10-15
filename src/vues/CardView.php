<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class CardView {

    public function render($idCarte) {
		$html = $idCarte;
		return $html;
    }
    
    public function renderRandomListCards($donnees) {
        $tableau = array();
		foreach ($donnees as $jeu) {
			array_push($tableau, $this->render($jeu->idCarte));
        }
        $debtab = current($tableau);
        $fintab = end($tableau);
        $nb_a_tirer = $fintab;
        $val_min = $debtab;
        $val_max = $fintab;
        $tab_result = array();
        while($nb_a_tirer != 0 ) {
            $nombre = mt_rand($val_min, $val_max);
            if( !in_array($nombre, $tab_result) ) {
                $tab_result[] = $nombre;
                $nb_a_tirer--;
            }
        }
        var_dump($tab_result);
    }
    
}