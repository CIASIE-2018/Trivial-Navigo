<?php
 echo "<style>
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
      width:25%;
      height:25%;
      border: solid 1px black;
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
 </style>";

 $taille_tab=13;
$tableau = array();

for($i=1;$i<=$taille_tab;$i++){
    for($j=1;$j<=$taille_tab;$j++){
        if($i-0.5==$taille_tab/2 && $j-0.5==$taille_tab/2 ){
            $tableau[$i][$j]=["theme"=>"depart","player"=>array()];
        }
        else
        if($i==1 || ($i-0.5==$taille_tab/2 && $j<$taille_tab/2)){
            switch($j%6){
                case 0: $tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                break;
                case 1:$tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                break;
                case 2:$tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                break;
                case 3:$tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                break;
                case 4:$tableau[$i][$j]=["theme"=>"info","player"=>array()];
                break;
                case 5:$tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                break;
        }
    }else if($i==$taille_tab || ($i-0.5==$taille_tab/2 && $j+1>$taille_tab/2) ){
        switch($j%6){
            case 0: $tableau[$i][$j]=["theme"=>"hist","player"=>array()];
            break;
            case 1:$tableau[$i][$j]=["theme"=>"diver","player"=>array()];
            break;
            case 2:$tableau[$i][$j]=["theme"=>"geo","player"=>array()];
            break;
            case 3:$tableau[$i][$j]=["theme"=>"perso","player"=>array()];
            break;
            case 4:$tableau[$i][$j]=["theme"=>"info","player"=>array()];
            break;
            case 5:$tableau[$i][$j]=["theme"=>"sport","player"=>array()];
            break;
    }
    }
        else if( $j==$taille_tab || ($j-0.5==$taille_tab/2 && $i<$taille_tab/2)){
            switch($i%6){
                case 0: $tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                break;
                case 1:$tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                break;
                case 2:$tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                break;
                case 3:$tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                break;
                case 4:$tableau[$i][$j]=["theme"=>"info","player"=>array()];
                break;
                case 5:$tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                break;
        }

    }else if($j==1 || ($j-0.5==$taille_tab/2 && $i>$taille_tab/2)){
        switch($i%6){
            case 0: $tableau[$i][$j]=["theme"=>"hist","player"=>array()];
            break;
            case 1:$tableau[$i][$j]=["theme"=>"diver","player"=>array()];
            break;
            case 2:$tableau[$i][$j]=["theme"=>"geo","player"=>array()];
            break;
            case 3:$tableau[$i][$j]=["theme"=>"perso","player"=>array()];
            break;
            case 4:$tableau[$i][$j]=["theme"=>"info","player"=>array()];
            break;
            case 5:$tableau[$i][$j]=["theme"=>"sport","player"=>array()];
            break;
    }
    }
        else
         $tableau[$i][$j]=["theme"=>null,"player"=>array()];
    }
}

$tableau[7][7]['player']=["player1","player2","player3","player4"];

$html="<table>";

for($i=1;$i<=$taille_tab;$i++){
    $html .= "<tr>";
    for($j=1;$j<=$taille_tab;$j++){
      $html .= "<td class={$tableau[$i][$j]['theme']}>";
        if($tableau[$i][$j]['player']!=null){
          foreach ($tableau[$i][$j]['player'] as $p) {
            $html .= "<div class='$p'></div>";
          }
        }
        $html .= "</td>";
    }
    $html .= "</tr>";
}

$html .= "</table>";

echo $html;
