<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dpto;
use App\Cargo;

class QueryController extends Controller
{
    public function allQuery(Request $request) {
    if (!$request->ajax()) { return redirect('/')};
   

    return [
        //'dptos' => Dpto::all(),
        'dptos' => Dpto::with('cargos')->get(),
        'cargos' => Cargo::with('dpto')->get(),
        'funcionarios' => Funcionario::with('cargo')->get()
        

    	];
	}
}
