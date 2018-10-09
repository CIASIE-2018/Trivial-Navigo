<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class JeuVue {

    public function renderPlateau($plateau){
        $html="<style>
        .geo, .hist, .diver, .sport, .info, .perso{
            width:50px;
            height:50px;
            border: solid 1px black;
        }
    
        .geo{
            background-color : cyan;
        }
        .hist{
            background-color : yellow;
        }
        .diver{
            background-color : pink;
        }
        .sport{
            background-color : orange;
        }
        .info{
            background-color : green;
        }
        .perso{
            background-color : purple;
        }
        .depart{
            width:100px;
            height:100px;
            background-color : black;
        }
        table{
            background:grey;
        }
    
        .player1, .player2, .player3, .player4{
          width:90%;
          height:90%;
          margin : auto;
          border: solid 1px black;
          display:flex;
        }
    
        .player1{
          background-color : red;
        }
        .player2{
          background-color : blue;
        }
        .player3{
          background-color : violet;
        }
        .player4{
          background-color : brown;
        }
        .divplayer{
        width:100%;
        height : 100%;
        display : grid;
        grid-template-columns: 50% 50%;
        }
     </style><table>";
    
        for($i=1;$i<=$plateau->getTaille();$i++){
            $html .= "<tr>";
            for($j=1;$j<=$plateau->getTaille();$j++){
            $html .= "<td class={$plateau->getTableau()[$i][$j]['theme']}>";
                if($plateau->getTableau()[$i][$j]['player']!=null){
                    $html .= "<div class='divplayer'>";
                foreach ($plateau->getTableau()[$i][$j]['player'] as $p) {
                    $html .= "<div class='$p'></div>";
                }
                $html .= "</div>";
                }
                $html .= "</td>";
            }
            $html .= "</tr>";
        }
    
        $html .= "</table>";
    
        return $html;
        }

	public function render($a) {
        $ach = GlobaleVue::header();
        $html = $this->renderPlateau($a->getPlateau());
		$acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}