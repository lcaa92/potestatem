<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\CertificadosAlunos;
use DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AlunosController extends Controller
{
    public function certificadosAlunos(){
        $alunos = CertificadosAlunos::select('user_id', DB::raw('count(user_id) AS num_certificados'))
            ->groupby('user_id')
            ->orderby('num_certificados', 'desc')
            ->limit(100)
            ->get();
        return view('alunos.certificados', ['alunos'=>$alunos]);
    }

    public function certificadosPorAluno($id = ''){
        try{
            $user = User::findOrFail($id);

            $certificados = CertificadosAlunos::select('c.curso', 'u.name', 'certificados_alunos.data_matricula', 'certificados_alunos.data_conclusao', 'certificados_alunos.nota')
                ->join('users as u', 'u.id', '=', 'certificados_alunos.user_id')
                ->join('cursos as c', 'certificados_alunos.curso_id', '=', 'c.id')
                ->where('u.id', '=', $id)
                ->get();
            
            return [
                'total' => $user->count(),
                'nome' => $user->name,
                'certificados' => $certificados->toArray()
            ];
        }catch(Exception $e){
            abort(500, 'Erro');
        }
        catch(ModelNotFoundException $e){
            abort(500, 'Erro');
        }
        abort(500, 'Erro');
    }
}
