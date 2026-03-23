<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;

Route::get('/', function () {
    return view('welcome');
});

// GET - Listar os usuários cadastrados
Route::get('/aluno/listar',[AlunoController::class, 'listar'])->name('aluno.listar');
name:('aluno.listar');

Route::get('/aluno/cadastrar', function(){
    return view('cadastro');
})->name('aluno.cadastro');