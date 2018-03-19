<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\CertificadosAlunos::class, function (Faker $faker) {

    $date = Carbon::create(2017, 5, 28, 0, 0, 0);
    return [
        'user_id' => App\User::where('tipo_user_id', '=', '2')->inRandomOrder()->first()->id,
        'curso_id' => App\Cursos::inRandomOrder()->first()->id,
        'data_matricula' =>  $date->format('Y-m-d'),
        'data_conclusao' => $date->addWeeks(rand(1, 52))->format('Y-m-d'),
        'nota' => mt_rand(8, 10)
    ];
});
