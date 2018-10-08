<?php

namespace trivial\modeles;

class Salon extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'SALON';
    protected $primaryKey = 'idSalon';
    public $timestamps = false;

    public function joueurs() {
        return $this->hasMany('trivial\modeles\Joueur', 'idSalon');
    }

}