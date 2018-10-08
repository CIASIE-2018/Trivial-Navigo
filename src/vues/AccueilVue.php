<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class AccueilVue {

	public function render($a) {
        $ach = GlobaleVue::header();
        $html = "<label>".$a."</label>";
		$acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}