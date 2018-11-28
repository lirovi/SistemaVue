<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Dpto;
use App\Cargo;

class Funcionario extends Model
{
    protected $fillable = [
    'name',
    'lastname',
    'email',
    'birthday',
    'cargo_id'
];

/**
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
	public function cargo() {
	    return $this - > belongsTo('App\Cargo');
	}

	public function getBirthdayAttribute($value)
		{
		    return Carbon::parse($value)->format('d-m-Y');
		}

	protected $appends = ['years', 'dpto'];

	 public function getYearsAttribute()
    {
        $hoy = Carbon::now();
        $fecha = Carbon::parse($this->birthday);
        return $fecha->diffInYears($hoy);
    }
    public function getDptoAttribute(){
        $departure=Dpto::find(Cargo::find($this->cargo_id)->dpto_id);
        return [
            'nombre'=>$dpto->nombre,
            'id'=>$dpto->id
        ];
    }
}
