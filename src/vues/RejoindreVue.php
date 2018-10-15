<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class RejoindreVue {

	public function render() {

        $ach = GlobaleVue::header();
		$html ='';
        $html = $html.<<<END
        <h1> Rejoindre Partie </h1>
       
    

END;
        $acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}