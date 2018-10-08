<?php

namespace trivial\modeles;

class Theme extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'THEME';
    protected $primaryKey = 'idTheme';
    public $timestamps = false;

    public function cartes() {
        return $this->hasMany('trivial\modeles\Carte', 'idTheme');
    }

}