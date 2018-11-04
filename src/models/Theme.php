<?php

namespace trivial\models;

/**
 * Class Theme
 */
class Theme extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'THEME';
    protected $primaryKey = 'idTheme';
    public $timestamps = false;

    public function cards() {
        return $this->hasMany('trivial\models\Carte', 'idTheme');
    }

}