<?php

use Illuminate\Database\Seeder;

class TipoUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_user')->insert([
            'tipo_user' => 'Admin',
        ]);
        DB::table('tipo_user')->insert([
            'tipo_user' => 'Aluno',
        ]);
    }
}
