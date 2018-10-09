<?php

namespace trivial\modeles;

class Joueur extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'JOUEUR';
    protected $primaryKey = 'idJoueur';
    public $timestamps = false;

    public function salon() {
        return $this->belongsTo('trivial\modeles\Salon', 'idJoueur');
    }

}