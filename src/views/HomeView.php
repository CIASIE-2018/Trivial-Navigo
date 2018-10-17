<?php

namespace trivial\views;

<<<<<<< HEAD:src/views/HomeView.php
use trivial\views\GlobalView;
=======
use trivial\vues\GlobaleVue;
<<<<<<< HEAD:src/views/HomeView.php
use trivial\controlleurs as c;
>>>>>>> be97a12... Affichage primitif d'un Accueil personnalisé avec le système de Session:src/vues/AccueilVue.php
=======

>>>>>>> a4da986... L'affichage personnalisé s'intègre au design:src/vues/AccueilVue.php

class HomeView {

	public function render() {
<<<<<<< HEAD:src/views/HomeView.php
        $ach = GlobalView::header();
=======
		$ach = GlobaleVue::header();
		
		$menu =<<<END
		<div class="boutton">
		<a href="Demarer" >Démarer Une Partie</a>
   </div>
   <div class="boutton">
		   <a href="Rejoindre" >Rejoindre Une Partie</a>
	  </div>
	  <div class="boutton">
		   <a href="CreateAccount" >Creer Compte</a>
	  </div>
	  <div class="boutton">
	  <a href="Connexion" >Connexion</a>
END;
		
		if(session_id() != ""){
			$menu =<<<END
		<div class="boutton">
		<a href="Demarer" >Démarer Une Partie</a>
   </div>
   <div class="boutton">
		   <a href="Rejoindre" >Rejoindre Une Partie</a>
	  </div>
	  <div class="boutton">
		   <a href="CreateAccount" >Creer Compte</a>
	  </div>
	  <div class="boutton">
	  <a href="Connexion" >Deconnexion</a>
END;
		


		}
		
>>>>>>> 4fefc5a... La page d'accueil se modifie en fonction de l'état de connexiondu joueur:src/vues/AccueilVue.php
		$html ='';
		$html = $html.<<<END


		<div class="screen">
<<<<<<< HEAD:src/views/HomeView.php
        <div class="boutton">
             <a href="Demarrer" >Démarer Une Partie</a>
        </div>
        <div class="boutton">
                <a href="Rejoindre" >Rejoindre Une Partie</a>
           </div>
           <div class="boutton">
                <a href="Connexion" >Connexion</a>
           </div>


=======
		$menu
	  </div>
      
      
>>>>>>> 4fefc5a... La page d'accueil se modifie en fonction de l'état de connexiondu joueur:src/vues/AccueilVue.php
    </div>

	<style>
	.screen{
		display: flex;
		flex-direction: column;
	   align-items: center;
	   width: 100%;
		border : 2px solid rgb(95, 89, 89);

		padding-bottom: 15px;
		padding-top: 15px;
	}
	body{
		background: url(back.jpg);
	}

	header{
		text-align: center;
		margin-top : 15%;
		margin-bottom : 5px;
	}
	select{
		color: #555;
		padding: 8px 16px;
		border: 1px solid transparent;
		border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
		cursor: pointer;
		user-select: none;
		background : #f5f5f5;
	}
	.boutton{
		padding:6px 0 6px 0;
		font:bold 13px Arial;
		background:#f5f5f5;
		color:#555;
		border-radius:2px;
		width:150px;
		border:1px solid #ccc;
		box-shadow:1px 1px 3px #999;
		text-align: center;
		margin-bottom: 15px;
		margin-top: 15px;
	}

	a{
		text-decoration: none;
		color : black;
	}

	.choice{
		display: flex;
		flex-direction: column;
		padding:15px 0 0 0;
		font:bold 13px Arial;

		border-radius:2px;
	}
	input{
		margin-top: 10px;
	}
	</style>
END;
		$acf = GlobalView::footer();
		return $ach.$html.$acf;
	}

}
