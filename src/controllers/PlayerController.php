<?php

namespace trivial\controllers;

use trivial\views\PlayerView;
use trivial\models as m;
use \Slim\Views\Twig as twig;
use trivial\controllers\Autentication;


class PlayerController{

	protected $view;

    public function __construct(twig $view) {
        $this->view = $view;
    }

    public function displayAccount($request,$response,$args){
    if( Authentication::checkConnection() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		return $this->view->render($response,'PlayerView.html.twig',[
			'pseudo'=>$pseudo,
		]);
		}

    public function displayQuestionSpace($request,$response,$args){
        if( Authentication::checkConnection() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
		return $this->view->render($response,'QuestionView.html.twig',[
			'pseudo'=>$pseudo,
		]);
		
    }

    public function testCreateQuestions(){
        $theme = $_POST['theme'] ;
		$question = $_POST['question'] ;
        $reponse = $_POST['reponse'] ;
        
        //Je récupère l'id du thème pour pouvoir la question
        $themeId = m\Theme::where('nomTheme','=',$theme);
        $themeId = $themeId->first();
        $id = $themeId->idTheme;
        self::createQuestions($id,$question,$reponse);

        global $app ;

        $url =  $app->getContainer()->get('router')->pathFor('MyAccount');
  
        header("Location: $url");
        exit();

    }

   public static function createQuestions($id,$question,$reponse){
       $carte = new m\Carte();

       $carte->idTheme = $id;
       $carte->question = $question;
       $carte->reponse = $reponse;

       $carte->save();
   }
}