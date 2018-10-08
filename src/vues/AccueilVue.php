<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class AccueilVue {

	public function render() {
        $ach = GlobaleVue::header();
        $html = "";
		$acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}