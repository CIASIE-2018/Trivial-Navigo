<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class DemarerVue {

	public function render() {

        $ach = GlobaleVue::header();
		$html ='';
        $html = $html.<<<END
        <h1> Démarer Partie </h1>
       
    

END;
        $acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}