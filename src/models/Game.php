<?php

namespace trivial\models;

class Game extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'GAME';
    protected $primaryKey = 'idGame';
    public $timestamps = false;
}
