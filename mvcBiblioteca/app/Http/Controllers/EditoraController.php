<?php

namespace App\Http\Controllers;

use App\Models\Editora;
use Illuminate\Http\Request;

class EditoraController extends Controller{

    public function listarEditora(){
        $editoras = Editora::all(); 
        return view('listarEditoras', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'cnpj' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'cidade' => 'required|string|max:255'
          
        ]);

        Editoras::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'pais' => $request->pais,
            'cidade' => $request->cidade

        ]);

        return redirect()->back()->with('success','Editora do livro cadastrado com sucesso!');
    }
}