<?php

use Illuminate\Database\Seeder;

class CreateCertificadosAlunos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\CertificadosAlunos::class, 300)->create()->make();
    }
}
