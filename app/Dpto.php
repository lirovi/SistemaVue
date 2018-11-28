<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dpto extends Model
{
    /protected $fillable=['nombre'];
}

public function cargos()
{
    return $this->hasMany('App\Cargo');
}