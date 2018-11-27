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
