<?php

namespace trivial\controllers;

use trivial\views\GameView;
use trivial\models\Game;
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
        $game = new Game();
        $board=new Board("pablo","rob","po","rakan");
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
        return $board["grid"][$player["position"][0]][$player["position"][1]]["theme"];
    }

    public function renderQuestion($request, $response, $args) {
        $idGame = $args["id"];
        $game = Game::find($idGame);
        $board = json_decode($game->board,true);
        $cards = $board['cards'];
        $themeQuestion = $args["theme"];
        $arr = array_filter($cards, function ($card) use ($themeQuestion) {
            switch($themeQuestion) {
                case "geo":
                    return $card['idTheme'] == 1;
                    break;
                case "diver":
                    return $card['idTheme'] == 2;
                    break;
                case "hist":
                    return $card['idTheme'] == 3;
                    break;
                case "sport":
                    return $card['idTheme'] == 4;
                    break;
                case "info":
                    return $card['idTheme'] == 5;
                    break;
                case "perso":
                    return $card['idTheme'] == 6;
                    break;
            }
        });
        $question = $arr[array_keys($arr)[0]];
        var_dump($question);
        unset($board['cards'][array_keys($arr)[0]]);
        $game->board = json_encode($board);
        $game->save();
        return $question;
    }
}
