<?php

namespace App\Http\Controllers;
use App\Models\Aluno;

use Illumiinate\Http\Request;

class AlunoController extends Controller
{
    public function listar(){
        $query = Aluno::query();
        $alunos = $query->get();
        return view('listar', compact('alunos'));
    }
}