<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dpto;

class DptoController extends Controller
{
   public function create(Request $request)
    {
        $dpto = new Dpto();
        $dpto->nombre = $request->nombre;
        $dpto->save();
    }
    public function delete($id)
    {
        $dpto = Dpto::find($id);
        $cargos = $dpto->cargos()->get();
        foreach ($cargos as $cargo) {
            $cargo->funcionarios()->delete();
        }
        $dpto->cargos()->delete();
        $dpto->delete();
    }
    public function update(Request $request)
    {
        $dpto = Dpto::find($request->id);
        $dpto->nombre = $request->nombre;
        $dpto->save();
    }

}
