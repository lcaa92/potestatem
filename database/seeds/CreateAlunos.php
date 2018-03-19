<?php

use Illuminate\Database\Seeder;

class CreateAlunos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 150)->create()->make();
    }
}
