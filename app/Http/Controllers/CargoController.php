<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CargoController extends Controller
{
   public function create(Request $request) {
    $cargo = new Cargo();
    $cargo->nombre = $request->nombre;
    $cargo->dpto_id = $request->dpto;
    $cargo->save();
	}

	public function delete($id)
{
    $cargo = Cargo::find($id);
    $cargo->funcionarios()->delete();
    $cargo->delete();
}

	public function update(Request $request) {
    $cargo = Cargo::find($request->id);
    $cargo->nombre = $request->nombre;
    $cargo->dpto_id = $request->dpto;
    $cargo->save();
	}
} 
