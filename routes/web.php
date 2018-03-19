<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => 'auth', 'prefix'=>'painel'], function () {
    Route::group(['prefix' => 'alunos'], function () {
        Route::get('certificados', 'AlunosController@certificadosAlunos')->name('certificados.alunos');
        Route::get('certificados/{user_id?}', 'AlunosController@certificadosPorAluno')->name('certificados.por.aluno');
    });
});
