<?php

namespace trivial\controllers;

class Authentication{

    public static function connexion($idJoueur , $pseudoJoueur){
        $_SESSION['idJoueur'] = $idJoueur ;
        $_SESSION['pseudoJoueur'] = $pseudoJoueur ;
        $_SESSION['role'] = 1 ;
      }
    
      //Verifier qu'une session existe
      public static function verificationConnexion(){
        if(isset($_SESSION['idJoueur']) ){
          return true ;
        }
        else{
          return false ;
        }
      }

      public static function deconnexion(){
        session_destroy();
    }

     
      
  
    

}
