<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertificadosAlunos extends Model
{
    protected $table = 'certificados_alunos';

    public function aluno()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
