<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    //

    public function certificados()
    {
        return $this->hasMany('App\CertificadosAlunos');
    }
}
