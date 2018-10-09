<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class AccueilVue {

	public function render() {
        $ach = GlobaleVue::header();
		$html ='';
		$html = $html.<<<END
		

		<div class="screen">
        <div class="boutton">
             <a href="Demarer" target="_blank">Démarer Une Partie</a>
        </div>
        <div class="boutton">
                <a href="Rejoindre" target="_blank">Rejoindre Une Partie</a>
           </div>
           <div class="boutton">
                <a href="Connexion" target="_blank">Connexion</a>
           </div>
      
      
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
		$acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}