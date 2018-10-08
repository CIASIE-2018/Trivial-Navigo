<?php

namespace trivial\vues;

class GlobaleVue {

	public static function header() {
		/*$app = \Slim\App::getInstance();
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
<footer>
 	<ul id="auteur">
				<li>Maeva BUTAYE</li><!--
				--><li>Camille SCHWARZ</li><!--
				--><li>Léo GALASSI</li><!--
				--><li>Quentin RIMET</li>
	</ul>
</footer>
</body>
</html>
END;
		return $html;
	}
	
}