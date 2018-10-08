<?php

namespace trivial\vues;

use trivial\vues\GlobaleVue;

class ConnexionVue {

	public function render() {
        $ach = GlobaleVue::header();
		$html ='';
        $html = $html.<<<END
        <h1> Connexion </h1>
        <div class="form">
        <tr>
        <th><label for="name"><strong>Name:</strong></label></th>
        <td><input class="inp-text" name="name" id="name" type="text" size="30" /></td>
    </tr>
    <tr>
        <th><label for="name"><strong>Password:</strong></label></th>
        <td><input class="inp-text" name="password" id="password" type="password" size="30" /></td>
    </tr>
    <tr>
    </div>
    

END;
        $acf = GlobaleVue::footer();
		return $ach.$html.$acf;
	}

}