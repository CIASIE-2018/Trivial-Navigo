<?php

namespace trivial\models;

/**
 * Class Joueur
 */
class Joueur extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'JOUEUR';
    protected $primaryKey = 'idJoueur';
    public $timestamps = false;

    public function room() {
        return $this->belongsTo('trivial\models\Salon', 'idJoueur');
    }

}