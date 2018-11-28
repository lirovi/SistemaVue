<?php
namespace App\Http\Controllers;
use App\Http\Requests\StoreFuncionario;
use App\Http\Requests\UpdateFuncionario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Funcionario;
class FuncionarioController extends Controller
{
    public function create(StoreFuncionario $request)
    {
        $today = Carbon::now();
        $unknow = Carbon::createFromFormat('d-m-Y', $request->birthday);
        if ($unknow->diffInYears($today) < 18) {
            return [
                'date' => ['El empleado tiene que tener mas de 18 años']
            ];
        } else {
            $funcionario=new Funcionario();
            $Funcionario->name=$request->name;
            $Funcionario->lastname=$request->lastname;
            $Funcionario->birthday=$unknow;
            $Funcionario->email=$request->email;
            $Funcionario->cargo_id=$request->cargo;
            $Funcionario->save();
        }
    }
    public function delete($id)
    {
        Funcionario::find($id)->delete();
    }
    public function update(UpdateFuncionario $request)
    {
        $today = Carbon::now();
        $unknow = Carbon::createFromFormat('d-m-Y', $request->birthday);
        if ($unknow->diffInYears($today) < 18) {
            return [
                'date' => ['El empleado tiene que tener mas de 18 años']
            ];
        } else {
            $funcionario=Funcionario::find($request->id);
            $funcionario->name=$request->name;
            $funcionario->lastname=$request->lastname;
            $funcionario->birthday=$unknow;
            $funcionario->email=$request->email;
            $funcionario->cargo_id=$request->cargo;
            $funcionario->save();
        }
    }
}