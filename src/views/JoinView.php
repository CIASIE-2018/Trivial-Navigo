<?php

namespace trivial\views;

use trivial\views\GlobalView;

class JoinView {

	public function render() {

        $ach = GlobalView::header();
		$html ='';
        $html = $html.<<<END
        <h1> Rejoindre Partie </h1>



END;
        $acf = GlobalView::footer();
		return $ach.$html.$acf;
	}

}
