<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cursos;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class CursosController extends Controller
{
    public function index(){
        return view('cursos.lista', [
            'cursos' => Cursos::all()
        ]);
    }

    public function addCurso(){
        return view('cursos.add-edit');
    }

    public function salvarCurso(Request $request){
        $curso = new Cursos();
        $validator = $this->validate($request, $curso->rules);
        
        $curso->curso = $request->curso;
        $curso->inativo = $request->inativo;
        $curso->save();

        return redirect()->route('lista.cursos');
    }

    public function editCurso($id){
        return view('cursos.add-edit', [
            'curso' => Cursos::find($id)
        ]);
    }

    public function updateCurso(Request $request){
        $curso = Cursos::find($request->id);
        $validator = $this->validate($request, $curso->rules);
        
        $curso->curso = $request->curso;
        $curso->inativo = $request->inativo;
        $curso->save();

        return redirect()->route('lista.cursos');
    }

    public function deleteCurso($id){
        try{
            Cursos::find($id)->delete();
            return;
        }catch(ModelNotFoundException $e){
            abort(404, $e->getMessage());
        }catch(Exception $e){
            abort(404, $e->getMessage());
        }
        abort(404);
    }

}
