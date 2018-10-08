<?php

namespace trivial\vues;

class GlobaleVue {

	public static function header() {
		/*$app = \Slim\App\Config::getInstance();
		$ac = $app->urlFor('Accueil');
		$rootUI = $app->request->getRootUri();
		$rootUI = str_replace('index.php','',$rootUI);*/
		$html = <<<END
<!DOCTYPE html>
<html>
<head>
		<title>Trivial Navigo</title>
		
        <meta charset="UTF-8">
END;
		$html = $html.<<<END
</head>
<body>
<div>
	<header>
		<h1><a href="">Trivial Navigo</a></h1>
	</header>
</div>
	<div id="content">
END;
		return $html;
	}
	
	public static function footer() {
		$html=<<<END
		</div>

		<div class="screen">
        <div class="boutton">
             <a href="Demarer.html" target="_blank">Démarer Une Partie</a>
        </div>
        <div class="boutton">
                <a href="Rejoindre.html" target="_blank">Rejoindre Une Partie</a>
           </div>
           <div class="boutton">
                <a href="Connexion.html" target="_blank">Connexion</a>
           </div>
      
      
    </div>

</body>
</html>

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
		return $html;


	}
	
}