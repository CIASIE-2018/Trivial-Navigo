<?php
namespace trivial;

 class Board {
    public $grid = array();

    public function newBoard(){
    $hist="hist";
    $geo="geo";
    $diver="diver";
    $sport="sport";
    $info="info";
    $perso="perso"; 

    $this->grid[1][1]=["theme"=>$hist,"player"=>array()];
    $this->grid[1][2]=["theme"=>$geo,"player"=>array()];
    $this->grid[1][3]=["theme"=> $diver,"player"=>array()];
    $this->grid[1][4]=["theme"=>$sport,"player"=>array()];
    $this->grid[1][5]=["theme"=>$info,"player"=>array()];
    $this->grid[1][6]=["theme"=>$perso,"player"=>array()];
    $this->grid[1][7]=["theme"=>$hist,"player"=>array()];
    $this->grid[1][8]=["theme"=>$perso,"player"=>array()];
    $this->grid[1][9]=["theme"=>$info,"player"=>array()];
    $this->grid[1][10]=["theme"=>$sport,"player"=>array()];
    $this->grid[1][11]=["theme"=> $diver,"player"=>array()];
    $this->grid[1][12]=["theme"=>$geo,"player"=>array()];

    $this->grid[1][13]=["theme"=>$hist,"player"=>array()];
    $this->grid[2][13]=["theme"=>$geo,"player"=>array()];
    $this->grid[3][13]=["theme"=>$diver,"player"=>array()];
    $this->grid[4][13]=["theme"=>$sport,"player"=>array()];
    $this->grid[5][13]=["theme"=>$info,"player"=>array()];
    $this->grid[6][13]=["theme"=> $perso,"player"=>array()];
    $this->grid[7][13]=["theme"=>$hist,"player"=>array()];
    $this->grid[8][13]=["theme"=>$perso,"player"=>array()];
    $this->grid[9][13]=["theme"=>$info,"player"=>array()];
    $this->grid[10][13]=["theme"=>$sport,"player"=>array()];
    $this->grid[11][13]=["theme"=> $diver,"player"=>array()];
    $this->grid[12][13]=["theme"=>$geo,"player"=>array()];
    $this->grid[13][13]=["theme"=>$hist,"player"=>array()];
    
    $this->grid[13][12]=["theme"=>$geo,"player"=>array()];
    $this->grid[13][11]=["theme"=> $diver,"player"=>array()];
    $this->grid[13][10]=["theme"=>$sport,"player"=>array()];
    $this->grid[13][9]=["theme"=>$info,"player"=>array()];
    $this->grid[13][8]=["theme"=>$perso,"player"=>array()];
    $this->grid[13][7]=["theme"=>$hist,"player"=>array()];
    $this->grid[13][6]=["theme"=>$perso,"player"=>array()];
    $this->grid[13][5]=["theme"=>$info,"player"=>array()];
    $this->grid[13][4]=["theme"=>$sport,"player"=>array()];
    $this->grid[13][3]=["theme"=> $diver,"player"=>array()];
    $this->grid[13][2]=["theme"=>$geo,"player"=>array()];
    $this->grid[13][1]=["theme"=>$hist,"player"=>array()];
    
    $this->grid[12][1]=["theme"=>$geo,"player"=>array()];
    $this->grid[11][1]=["theme"=> $diver,"player"=>array()];
    $this->grid[10][1]=["theme"=>$sport,"player"=>array()];
    $this->grid[9][1]=["theme"=>$info,"player"=>array()];
    $this->grid[8][1]=["theme"=>$perso,"player"=>array()];
    $this->grid[7][1]=["theme"=>$hist,"player"=>array()];
    $this->grid[6][1]=["theme"=>$perso,"player"=>array()];
    $this->grid[5][1]=["theme"=>$info,"player"=>array()];
    $this->grid[4][1]=["theme"=>$sport,"player"=>array()];
    $this->grid[3][1]=["theme"=> $diver,"player"=>array()];
    $this->grid[2][1]=["theme"=>$geo,"player"=>array()];

    $this->grid[7][2]=["theme"=>$perso,"player"=>array()];
    $this->grid[7][3]=["theme"=>$info,"player"=>array()];
    $this->grid[7][4]=["theme"=>$sport,"player"=>array()];
    $this->grid[7][5]=["theme"=>$diver,"player"=>array()];
    $this->grid[7][6]=["theme"=>$geo,"player"=>array()];
    $this->grid[7][8]=["theme"=>$geo,"player"=>array()];
    $this->grid[7][9]=["theme"=>$diver,"player"=>array()];
    $this->grid[7][10]=["theme"=>$sport,"player"=>array()];
    $this->grid[7][11]=["theme"=>$info,"player"=>array()];
    $this->grid[7][12]=["theme"=>$perso,"player"=>array()];

    $this->grid[2][7]=["theme"=>$perso,"player"=>array()];
    $this->grid[3][7]=["theme"=>$info,"player"=>array()];
    $this->grid[4][7]=["theme"=>$sport,"player"=>array()];
    $this->grid[5][7]=["theme"=>$diver,"player"=>array()];
    $this->grid[6][7]=["theme"=>$geo,"player"=>array()];
    $this->grid[8][7]=["theme"=>$geo,"player"=>array()];
    $this->grid[9][7]=["theme"=>$diver,"player"=>array()];
    $this->grid[10][7]=["theme"=>$sport,"player"=>array()];
    $this->grid[11][7]=["theme"=>$info,"player"=>array()];
    $this->grid[12][7]=["theme"=>$perso,"player"=>array()];

    $this->grid[7][7]=["theme"=>"depart","player"=>array()];
    
    $this->grid[7][7]['player']=["player1","player2","player3","player4"];
    }

 }