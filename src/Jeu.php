<?php 
namespace trivial;

use trivial\Plateau;

class jeu {
    private $plateau= array();

    public function __construct(){
        $this->plateau = new Plateau();
        $this->plateau->creaPlateau();
    }

    public function getPlateau(){
        return $this->plateau;
    }
}
