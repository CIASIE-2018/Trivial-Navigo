<?php

namespace trivial\models;

/**
 * Class Salon
 */
class Salon extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'SALON';
    protected $primaryKey = 'idSalon';
    public $timestamps = false;

    public function players() {
        return $this->hasMany('trivial\models\Joueur', 'idSalon');
    }

}