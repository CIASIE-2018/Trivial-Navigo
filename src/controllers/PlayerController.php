<?php

namespace trivial\controllers;

use trivial\models as m;
use trivial\controllers\Authentication;
use \Slim\Views\Twig as twig;
use trivial\views\PlayerView;

/**
 * Class PlayerController
 */
class PlayerController{

	protected $view;

    /**
	 * Constructor of the class PlayerController
	 * @param view
	 */
    public function __construct(twig $view) {
        $this->view = $view;
    }

    /**
	 * Method that displays the information connected at the account of the player
	 * @param request
	 * @param response
	 * @param args
	 */
    public function displayAccount($request, $response, $args) {
        if (Authentication::verificationConnexion()) {
            $pseudo = "Bienvenue ".$_SESSION['pseudoPlayer'];
            $player = m\Joueur::where('pseudoJoueur', '=', $_SESSION['pseudoPlayer'])->first();
            $nbGoodAnswers = $player['nbBonnesReponses'];
            $nbTotalQuestions = $player['nbTotalQuestions'];
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response, 'PlayerView.html.twig', [
            'pseudo' => $pseudo,
            'bonneRep' => $nbGoodAnswers,
            'totalQues' => $nbTotalQuestions,
		]);
	}

    /**
	 * Method that displays the form for the creation of questions
	 * @param request
	 * @param response
	 * @param args
	 */
    public function displayQuestionSpace($request, $response, $args){
        if (Authentication::checkConnection()) {
			$pseudo = "Bienvenue ".$_SESSION['pseudoPlayer'];
		}
		else {
			$pseudo = "";
		}
		return $this->view->render($response, 'QuestionView.html.twig', [
			'pseudo' => $pseudo,
		]);
    }

    // Method that checks the creating of a card
    public function checkCreateQuestion(){
        $theme = $_POST['theme'];
		$question = $_POST['question'];
        $answer = $_POST['reponse'];
        $themeId = m\Theme::where('nomTheme', '=', $theme);
        $themeIdent = $themeId->first();
        $id = $themeIdent->idTheme;
        self::createQuestion($id, $question, $answer);
    }

    /**
     * Method that creates a card
     * @param idTheme
     * @param question
     * @param answer
     */
    public static function createQuestion($idTheme, $question, $answer){
        $carte = new m\Carte();
        $carte->idTheme = $idTheme;
        $carte->question = $question;
        $carte->reponse = $answer;
        $carte->save();
    }
    
}