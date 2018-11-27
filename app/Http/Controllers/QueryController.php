<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dpto;

class QueryController extends Controller
{
    public function allQuery(Request $request){     
		if (!$request->ajax()) return redirect('/');    
		return [
		         'dptos'=>Dpto::all()
		       ];
	}
}
