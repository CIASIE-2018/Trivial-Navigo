<?php

namespace trivial\modeles;

class Carte extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'CARTE';
    protected $primaryKey = 'idCarte';
    public $timestamps = false;

    public function theme() {
        return $this->belongsTo('trivial\modeles\Theme', 'idCarte');
    }

}