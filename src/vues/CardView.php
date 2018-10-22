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
    
    /*public function renderRandomListCards($donnees, $theme) {
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
        var_dump($tab_result);
        foreach($tab_result as $test) {
            //var_dump($test);
            //var_dump($theme[$test-1]->idTheme);
        }
        $html = <<<END
            <script>
                var intervalID;
                var i = 0;
                function test() {
                    console.log($tab_result[i]);
                    i++;
                }
                function aff() {
                    intervalID = setInterval(test, 10000);
                }
            </script>
            <body onload="aff();"></body>
END;
                return $html;
        //var_dump($tab_result);
    }*/

    public function renderRandomListCardsGeo($donnees) {
        //var_dump($donnees);
        foreach($donnees as $jeu) {
            var_dump($jeu->idCarte);
        }
        return $test;
        /*$tableau = array();
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
        var_dump($tab_result);
        foreach($tab_result as $test) {
            //var_dump($test);
            //var_dump($theme[$test-1]->idTheme);
        }
        $html = <<<END
            <script>
                var intervalID;
                var i = 0;
                function test() {
                    console.log($tab_result[i]);
                    i++;
                }
                function aff() {
                    intervalID = setInterval(test, 10000);
                }
            </script>
            <body onload="aff();"></body>
END;
                return $html;
        //var_dump($tab_result);*/
    }

}