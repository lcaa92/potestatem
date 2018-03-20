<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    public $rules = [
        'curso' => 'required|min:3|max:255',
        'inativo' => 'required|in:0,1',
    ];

    public function certificados()
    {
        return $this->hasMany('App\CertificadosAlunos');
    }
}
