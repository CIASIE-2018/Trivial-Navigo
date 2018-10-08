<?php
 echo "<style>
    .geo{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : cyan;
    }
    .hist{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : yellow;
    }
    .diver{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : pink;
    }
    .sport{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : orange;
    }
    .info{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : green;
    }
    .perso{
        width:50px;
        height:50px;
        border: solid 1px black;
        background-color : purple;
    }
    .depart{
        width:100px;
        height:100px;
        border: solid 1px black;
        background-color : black;
    }
    table{
        background:grey;
    }
 </style>";

 $taille_tab=13;
$tableau = array();

for($i=1;$i<=$taille_tab;$i++){
    for($j=1;$j<=$taille_tab;$j++){
        if($i-0.5==$taille_tab/2 && $j-0.5==$taille_tab/2 ){
            $tableau[$i][$j]="depart";
        }
        else
        if($i==1 || ($i-0.5==$taille_tab/2 && $j<$taille_tab/2)){
            switch($j%6){
                case 0: $tableau[$i][$j]="geo";
                break;
                case 1:$tableau[$i][$j]="diver";
                break;
                case 2:$tableau[$i][$j]="hist";
                break;
                case 3:$tableau[$i][$j]="sport";
                break;
                case 4:$tableau[$i][$j]="info";
                break;
                case 5:$tableau[$i][$j]="perso";
                break;
        }
    }else if($i==$taille_tab || ($i-0.5==$taille_tab/2 && $j+1>$taille_tab/2) ){
        switch($j%6){
            case 0: $tableau[$i][$j]="hist";
            break;
            case 1:$tableau[$i][$j]="diver";
            break;
            case 2:$tableau[$i][$j]="geo";
            break;
            case 3:$tableau[$i][$j]="perso";
            break;
            case 4:$tableau[$i][$j]="info";
            break;
            case 5:$tableau[$i][$j]="sport";
            break;
    }
    }
        else if( $j==$taille_tab || ($j-0.5==$taille_tab/2 && $i<$taille_tab/2)){
            switch($i%6){
                case 0: $tableau[$i][$j]="geo";
                break;
                case 1:$tableau[$i][$j]="diver";
                break;
                case 2:$tableau[$i][$j]="hist";
                break;
                case 3:$tableau[$i][$j]="sport";
                break;
                case 4:$tableau[$i][$j]="info";
                break;
                case 5:$tableau[$i][$j]="perso";
                break;
        }
        
    }else if($j==1 || ($j-0.5==$taille_tab/2 && $i>$taille_tab/2)){
        switch($i%6){
            case 0: $tableau[$i][$j]="hist";
            break;
            case 1:$tableau[$i][$j]="diver";
            break;
            case 2:$tableau[$i][$j]="geo";
            break;
            case 3:$tableau[$i][$j]="perso";
            break;
            case 4:$tableau[$i][$j]="info";
            break;
            case 5:$tableau[$i][$j]="sport";
            break;
    }
    }
        else
         $tableau[$i][$j]="";
    }
}
echo "<table>";
for($i=1;$i<=$taille_tab;$i++){
    echo "<tr>";
    for($j=1;$j<=$taille_tab;$j++){
        echo "<td class={$tableau[$i][$j]}>";
        
        echo "</td>";
    }
    echo "</tr>";
}

echo "</table>";