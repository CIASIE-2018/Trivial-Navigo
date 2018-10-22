<?php
namespace trivial;

 class Board {
    public $grid = array();
    public $player;
    public $turn=1;


    const hist="hist";
    const geo="geo";
    const diver="diver";
    const sport="sport";
    const info="info";
    const perso="perso"; 

    public function __construct($player1,$player2,$player3,$player4){

        $this->player[0]=["name" => $player1,"position"=>[7,1]];
        $this->player[1]=["name" => $player2,"position"=>[7,1]];
        $this->player[2]=["name" => $player3,"position"=>[7,1]];
        $this->player[3]=["name" => $player4,"position"=>[7,1]];

    $this->grid[1][1]=["theme"=>self::hist,"player"=>array()];
    $this->grid[1][2]=["theme"=>self::geo,"player"=>array()];
    $this->grid[1][3]=["theme"=>self::diver,"player"=>array()];
    $this->grid[1][4]=["theme"=>self::sport,"player"=>array()];
    $this->grid[1][5]=["theme"=>self::info,"player"=>array()];
    $this->grid[1][6]=["theme"=>self::perso,"player"=>array()];
    $this->grid[1][7]=["theme"=>self::hist,"player"=>array()];
    $this->grid[1][8]=["theme"=>self::perso,"player"=>array()];
    $this->grid[1][9]=["theme"=>self::info,"player"=>array()];
    $this->grid[1][10]=["theme"=>self::sport,"player"=>array()];
    $this->grid[1][11]=["theme"=>self::diver,"player"=>array()];
    $this->grid[1][12]=["theme"=>self::geo,"player"=>array()];

    $this->grid[1][13]=["theme"=>self::hist,"player"=>array()];
    $this->grid[2][13]=["theme"=>self::geo,"player"=>array()];
    $this->grid[3][13]=["theme"=>self::diver,"player"=>array()];
    $this->grid[4][13]=["theme"=>self::sport,"player"=>array()];
    $this->grid[5][13]=["theme"=>self::info,"player"=>array()];
    $this->grid[6][13]=["theme"=> self::perso,"player"=>array()];
    $this->grid[7][13]=["theme"=>self::hist,"player"=>array()];
    $this->grid[8][13]=["theme"=>self::perso,"player"=>array()];
    $this->grid[9][13]=["theme"=>self::info,"player"=>array()];
    $this->grid[10][13]=["theme"=>self::sport,"player"=>array()];
    $this->grid[11][13]=["theme"=> self::diver,"player"=>array()];
    $this->grid[12][13]=["theme"=>self::geo,"player"=>array()];
    $this->grid[13][13]=["theme"=>self::hist,"player"=>array()];
    
    $this->grid[13][12]=["theme"=>self::geo,"player"=>array()];
    $this->grid[13][11]=["theme"=> self::diver,"player"=>array()];
    $this->grid[13][10]=["theme"=>self::sport,"player"=>array()];
    $this->grid[13][9]=["theme"=>self::info,"player"=>array()];
    $this->grid[13][8]=["theme"=>self::perso,"player"=>array()];
    $this->grid[13][7]=["theme"=>self::hist,"player"=>array()];
    $this->grid[13][6]=["theme"=>self::perso,"player"=>array()];
    $this->grid[13][5]=["theme"=>self::info,"player"=>array()];
    $this->grid[13][4]=["theme"=>self::sport,"player"=>array()];
    $this->grid[13][3]=["theme"=> self::diver,"player"=>array()];
    $this->grid[13][2]=["theme"=>self::geo,"player"=>array()];
    $this->grid[13][1]=["theme"=>self::hist,"player"=>array()];
    
    $this->grid[12][1]=["theme"=>self::geo,"player"=>array()];
    $this->grid[11][1]=["theme"=> self::diver,"player"=>array()];
    $this->grid[10][1]=["theme"=>self::sport,"player"=>array()];
    $this->grid[9][1]=["theme"=>self::info,"player"=>array()];
    $this->grid[8][1]=["theme"=>self::perso,"player"=>array()];
    $this->grid[7][1]=["theme"=>self::hist,"player"=>array()];
    $this->grid[6][1]=["theme"=>self::perso,"player"=>array()];
    $this->grid[5][1]=["theme"=>self::info,"player"=>array()];
    $this->grid[4][1]=["theme"=>self::sport,"player"=>array()];
    $this->grid[3][1]=["theme"=> self::diver,"player"=>array()];
    $this->grid[2][1]=["theme"=>self::geo,"player"=>array()];

    $this->grid[7][2]=["theme"=>self::perso,"player"=>array()];
    $this->grid[7][3]=["theme"=>self::info,"player"=>array()];
    $this->grid[7][4]=["theme"=>self::sport,"player"=>array()];
    $this->grid[7][5]=["theme"=>self::diver,"player"=>array()];
    $this->grid[7][6]=["theme"=>self::geo,"player"=>array()];
    $this->grid[7][8]=["theme"=>self::geo,"player"=>array()];
    $this->grid[7][9]=["theme"=>self::diver,"player"=>array()];
    $this->grid[7][10]=["theme"=>self::sport,"player"=>array()];
    $this->grid[7][11]=["theme"=>self::info,"player"=>array()];
    $this->grid[7][12]=["theme"=>self::perso,"player"=>array()];

    $this->grid[2][7]=["theme"=>self::perso,"player"=>array()];
    $this->grid[3][7]=["theme"=>self::info,"player"=>array()];
    $this->grid[4][7]=["theme"=>self::sport,"player"=>array()];
    $this->grid[5][7]=["theme"=>self::diver,"player"=>array()];
    $this->grid[6][7]=["theme"=>self::geo,"player"=>array()];
    $this->grid[8][7]=["theme"=>self::geo,"player"=>array()];
    $this->grid[9][7]=["theme"=>self::diver,"player"=>array()];
    $this->grid[10][7]=["theme"=>self::sport,"player"=>array()];
    $this->grid[11][7]=["theme"=>self::info,"player"=>array()];
    $this->grid[12][7]=["theme"=>self::perso,"player"=>array()];

    $this->grid[7][7]=["theme"=>"depart","player"=>array()];
    
    $this->grid[7][1]['player']=[$this->player[0],$this->player[1],$this->player[2],$this->player[3]];
    }

 }