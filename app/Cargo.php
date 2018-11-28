<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
    'nombre',
    'dpto_id'
	];

	public function funcionario()
	{
	    return $this->hasMany('App\Funcionario');
	}
}

