<?php

namespace trivial\controllers;

use trivial\views\GameView;
use trivial\models\Game;
use trivial\models\Salon;
use trivial\models\Joueur;
use trivial\Board;
use \Slim\Views\Twig as twig;

class GameController{
    protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }
    public function renderBoard($request, $response, $args) {
      $idGame=$args["id"];
      $game = Game::find($idGame);
      $board=json_decode($game->board,true);
      return $this->view->render($response,'GameView.html.twig',[
        'board' => $board
    ]);
    }

    public function newGame($request, $response, $args){
        $idSalon=Salon::all()->where("nomSalon","=",$args['id'])->first()->idSalon;
        $game = new Game();
        $player=array();
        foreach(Joueur::all()->where("idSalon","=",$idSalon)->toArray() as $name){
            $player[]=$name["pseudoJoueur"];
        }
        $board=new Board($player);
        $game->board = json_encode($board);
        $game->idGame = $args['id'];
       $game->save();
    }

    public function playerMove($request, $response, $args){
        //setup our board
        $idGame=$args["id"];
        $game = Game::find($idGame);
        $board=json_decode($game->board,true);
        //we take the player who can actually play
        $player=$board["player"][$board["turn"]];
        //player is no longer in the same case
        unset($board["grid"][$player["position"][0]][$player["position"][1]]["player"][$board["turn"]]);
        //the player move and change position 
        for($i=0;$i<$args["dep"];$i++){
            if(($player["position"][1]==1 && $player["position"][0]!=1 && $args["dir"]=="d") || ($player["position"][1]==13 && $player["position"][0]!=1 && $args["dir"]=="g")){
                $player["position"][0]--;
            }
            else
            if(($player["position"][0]==1 && $player["position"][1]!=13 && $args["dir"]=="d") || ($player["position"][0]==13 && $args["dir"]=="g")){
                $player["position"][1]++;
            }
            else
            if(($player["position"][1]==1 && $args["dir"]=="g" || $player["position"][1]==13 && $player["position"][0]!=13 && $args["dir"]=="d")){
                $player["position"][0]++;
            }
            else
            if(($player["position"][0]==1 && $args["dir"]=="g" || $player["position"][0]==13 && $args["dir"]=="d")){
                $player["position"][1]--;
            }
        }
        //save our modification
        $board["grid"][$player["position"][0]][$player["position"][1]]["player"][$board["turn"]]=$player;
        $board["player"][$board["turn"]]=$player;
        $game->board=json_encode($board);
        $game->save();
    }
}
