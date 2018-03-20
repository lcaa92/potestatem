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

    Route::group(['prefix' => 'cursos'], function () {
        Route::get('/', 'CursosController@index')->name('lista.cursos');
        Route::get('/new', 'CursosController@addCurso')->name('add.cursos');
        Route::post('/save', 'CursosController@salvarCurso')->name('salvar.cursos');
        Route::get('/edit/{id}', 'CursosController@editCurso')->name('edit.cursos');
        Route::post('/update', 'CursosController@updateCurso')->name('atualizar.cursos');
        Route::delete('/delete/{id}', 'CursosController@deleteCurso')->name('delete.cursos');
    });

    Route::group(['prefix' => 'reports'], function () {
        Route::get('/top100alunos', 'AlunosController@reportTop100Alunos')->name('reports.100alunos');
    });

});
