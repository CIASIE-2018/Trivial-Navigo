<?php
namespace trivial;

 class Plateau {
    private $tableau = array();
    private $taille_tab=13;

    public function creaPlateau(){
    for($i=1;$i<=$this->taille_tab;$i++){
        for($j=1;$j<=$this->taille_tab;$j++){
            if($i-0.5==$this->taille_tab/2 && $j-0.5==$this->taille_tab/2 ){
                $this->tableau[$i][$j]=["theme"=>"depart","player"=>array()];
            }
            else
            if($i==1 || ($i-0.5==$this->taille_tab/2 && $j<$this->taille_tab/2)){
                switch($j%6){
                    case 0:$this->tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                    break;
                    case 1:$this->tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                    break;
                    case 2:$this->tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                    break;
                    case 3:$this->tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                    break;
                    case 4:$this->tableau[$i][$j]=["theme"=>"info","player"=>array()];
                    break;
                    case 5:$this->tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                    break;
            }
        }else if($i==$this->taille_tab || ($i-0.5==$this->taille_tab/2 && $j+1>$this->taille_tab/2) ){
            switch($j%6){
                case 0: $this->tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                break;
                case 1:$this->tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                break;
                case 2:$this->tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                break;
                case 3:$this->tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                break;
                case 4:$this->tableau[$i][$j]=["theme"=>"info","player"=>array()];
                break;
                case 5:$this->tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                break;
        }
        }
            else if( $j==$this->taille_tab || ($j-0.5==$this->taille_tab/2 && $i<$this->taille_tab/2)){
                switch($i%6){
                    case 0: $this->tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                    break;
                    case 1:$this->tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                    break;
                    case 2:$this->tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                    break;
                    case 3:$this->tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                    break;
                    case 4:$this->tableau[$i][$j]=["theme"=>"info","player"=>array()];
                    break;
                    case 5:$this->tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                    break;
            }

        }else if($j==1 || ($j-0.5==$this->taille_tab/2 && $i>$this->taille_tab/2)){
            switch($i%6){
                case 0: $this->tableau[$i][$j]=["theme"=>"hist","player"=>array()];
                break;
                case 1:$this->tableau[$i][$j]=["theme"=>"diver","player"=>array()];
                break;
                case 2:$this->tableau[$i][$j]=["theme"=>"geo","player"=>array()];
                break;
                case 3:$this->tableau[$i][$j]=["theme"=>"perso","player"=>array()];
                break;
                case 4:$this->tableau[$i][$j]=["theme"=>"info","player"=>array()];
                break;
                case 5:$this->tableau[$i][$j]=["theme"=>"sport","player"=>array()];
                break;
        }
        }
            else
            $this->tableau[$i][$j]=["theme"=>null,"player"=>array()];
        }
    }
    
    $this->tableau[7][7]['player']=["player1","player2","player3","player4"];
    }

    function getTableau(){
        return $this->tableau;
    }
    function getTaille(){
        return $this->taille_tab;
    }
 }