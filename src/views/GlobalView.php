<?php

<<<<<<< HEAD:src/views/GlobalView.php
namespace trivial\views;
=======
namespace trivial\vues;
use trivial\controlleurs as c;
>>>>>>> a4da986... L'affichage personnalisé s'intègre au design:src/vues/GlobaleVue.php

class GlobalView {

	public static function header() {
		
		if( c\Authentication::verificationConnexion() ){
			$pseudo= $_SESSION['pseudoJoueur'] ;
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
		<h5> Bienvenue $pseudo</h5>
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
