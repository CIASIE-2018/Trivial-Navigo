<?php

namespace trivial\controllers;

/**
 * Class Authentication
 */
class Authentication {

    /**
     * Method that
     * 
     * @param idPlayer
     * @param pseudoPlayer
     */ 
    public static function connexion($idPlayer, $pseudoPlayer){
      $_SESSION['idPlayer'] = $idPlayer;
      $_SESSION['pseudoPlayer'] = $pseudoPlayer;
      $_SESSION['role'] = 1;
    }
    
    // Method that checks a connection
    public static function checkConnection(){
      if(isset($_SESSION['idPlayer']) ){
        return true ;
      }
      else{
        return false ;
      }
    }

    // Method that
    public static function deconnexion(){
      session_destroy();
    }

}