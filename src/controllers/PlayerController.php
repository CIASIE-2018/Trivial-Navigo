<?php

namespace trivial\controllers;

use trivial\views\PlayerView;
use trivial\models as m;

class PlayerController{


    public function displayAccount(){
        $av = new PlayerView();
		echo $av->render();
    }

    public function displayQuestionSpace(){
        $av = new PlayerView();
		echo $av->renderQuestionSpace();
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