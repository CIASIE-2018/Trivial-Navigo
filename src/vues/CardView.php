<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class CardView {

    public function renderCard($idCarte) {
		$html = $idCarte;
		return $html;
    }

    public function renderTheme($idTheme) {
        $html = $idTheme;
        return $html;
    }
    
    public function renderRandomListCards($donnees, $theme) {
        $tableau = array();
		foreach ($donnees as $jeu) {
            array_push($tableau, $this->renderCard($jeu->idCarte));
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
        foreach($tab_result as $test) {
            var_dump($test);
            var_dump($theme[$test]->idTheme);
        }
        //var_dump($tab_result);
    }

}