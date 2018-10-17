<?php

namespace trivial\controlleurs;

class Authentication{

    public static function connexion($idJoueur , $pseudoJoueur){
        $_SESSION['idJoueur'] = $idJoueur ;
        $_SESSION['pseudoJoueur'] = $pseudoJoueur ;
        $_SESSION['role'] = 1 ;
      }
    
      public static function verificationConnexion(){
        if(isset($_SESSION['idJoueur']) ){
          return true ;
        }
        else{
          return false ;
        }
      }
    

}