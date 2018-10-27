<?php

namespace trivial\controllers;

use trivial\views\GameView;
use trivial\views\CamembertView;
use trivial\models\Game;
use trivial\models\Carte;
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
        $board=new Board("Lily","Leo","Quentin","Camille");
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
        unset($board['cards'][array_keys($arr)[0]]);
        $game->board = json_encode($board);
        $game->save();
        return $this->view->render($response,'FormQuestionView.html.twig',[
            'question' => $question,
            'theme' => $themeQuestion,
            'idGame' => $idGame
        ]);
    }

    public function checkSubmissionForm($request, $response, $args) {
        $idGame = $args["id"];
        $game = Game::find($idGame);
        $board = json_decode($game->board,true);
        $player=$board["player"][$board["turn"]];
        $themeQuestion = ucfirst($args["theme"]);

        $idCarte = strtolower($_POST["idCarte"]);
        $repSaisie = $_POST["reponse"];
        $carte = Carte::find($idCarte);
        $arrCarte = json_decode($carte, true);
        $repCarte = strtolower($arrCarte["reponse"]);
        $simi = self::similaire($repCarte, $repSaisie);
        if ($simi >= 80.00) {
            
            return true;
        }
        else {
            return false;
        }
    }

    public static function similaire($str1, $str2) { 
        $strlen1=strlen($str1);
        $strlen2=strlen($str2);
        $max=max($strlen1, $strlen2);
        $splitSize=250;
        if($max>$splitSize) {
            $lev=0;
            for($cont=0;$cont<$max;$cont+=$splitSize) {
                if($strlen1<=$cont || $strlen2<=$cont) {
                    $lev=$lev/($max/min($strlen1,$strlen2));
                    break;
                }
                $lev+=levenshtein(substr($str1,$cont,$splitSize), substr($str2,$cont,$splitSize));
            }
        }
        else {
            $lev=levenshtein($str1, $str2);
        }
        $porcentage= -100*$lev/$max+100;
        if($porcentage>75) {
            similar_text($str1,$str2,$porcentage);
        }
        return $porcentage;
    }

    public function renderCamembert($request, $response, $args){
        $idGame=$args["id"];
        $game = Game::find($idGame);
        $board=json_decode($game->board,true);

        $n = $board["player"][$board["turn"]]['name'];
        $joueur = Joueur::where('pseudoJoueur','=',$n)->first()->toArray();
        $tab = ['name' => $joueur['pseudoJoueur'], 'camGeo' => $joueur['camembertGeo'], 'camDiver' => $joueur['camembertDiver'], 'camHist' => $joueur['camembertHist'], 'camSport' => $joueur['camembertSport'], 'camInfo' => $joueur['camembertInfo'], 'camPerso' => $joueur['camembertPerso']];
        return $this->view->render($response,'GameView.html.twig',[
            'board'=>$board, 'cam' => $tab
        ]);
    }
}