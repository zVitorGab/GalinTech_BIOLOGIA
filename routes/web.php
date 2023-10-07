<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
})->name('index');

Route::resource('eixo', 'EixoController');
Route::resource('curso', 'CursoController');
Route::resource('disciplina', 'DisciplinaController');
Route::resource('professor', 'ProfessorController');
Route::resource('aluno', 'AlunoController');

Route::get('vinculo', 'ProfessorController@vinculo')->name('professor.vinculo');
Route::post('vinculoStore', 'ProfessorController@vinculoStore')->name('professor.vinculoStore');

Route::get('matricula/{id}', 'AlunoController@matricula')->name('aluno.matricula');
Route::post('matriculaStore', 'AlunoController@matriculaStore')->name('aluno.matriculaStore');

