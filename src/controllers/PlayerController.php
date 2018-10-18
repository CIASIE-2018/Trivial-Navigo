<?php

namespace trivial\controllers;

use trivial\views\PlayerView;

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
        
       
      

    }
}