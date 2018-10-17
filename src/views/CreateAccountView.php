<?php

namespace trivial\views;

use trivial\views\GlobalView;

class CreateAccountView {
	

	public function render() {
        $ach = GlobalView::header();
		$html ='';	
        $html = $html.<<<END
        <h4> Créer Un Compte </h4>
<div class="screen">

	 
	 <form action="" method="post">
		 <p>
			<p> pseudo : </p> <input type="text" name="pseudo" /> <p> mdp : </p> <input type="password" name="mdp" /> <p> email : </p> <input type="text" name="email" /> <input type="submit" value="Valider" />
		 </p>
	 </form>


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
    
    h4{
        text-align : center;
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