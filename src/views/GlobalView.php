<?php

namespace trivial\views;

use trivial\controllers as c;


class GlobalView {

	public static function header() {
		
		if( c\Authentication::verificationConnexion() ){
			$pseudo= "Bienvenue " .$_SESSION['pseudoJoueur'] ;
		}
		else{
			$pseudo = "";
		}
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
		<h1>Trivial Navigo</h1>
		<h5>$pseudo</h5>
	</header>
</div>
	<div id="content">
END;
		return $html;
	}

	public static function footer() {
		$html=<<<END
		</div>



</body>
</html>


END;
		return $html;


	}

}
