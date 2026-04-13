<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use App\Models\Editora;
use App\Models\DetalheLivro;
use Illuminate\Http\Request;

class LivroController extends Controller{

    public function listar(){
        $livros = Livro::with(['editora','detalhe'])->get();
        return view('listar', compact('livros'));
    }

    public function create(){
        $editoras = Editora::all();
        return view('cadastro', compact('editoras'));
    }

    public function add(Request $request){

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numeroPaginas' => 'required|string|max:255',
            'dataPublicacao' => 'required|string|max:255',
            'nomeEditora' => 'required|string|max:255',
            'custo' => 'required|numeric|max:255',
            'precoVenda' => 'required|string|max:255',
            'imposto' => 'required|string|max:255',
            'editora_id' => 'required|exists:editoras,id',
            'editora' => 'required|string|max:255'
          
        ]);

        $detalhe = DetalheLivro::create([
            'custo' => $request->custo,
            'precoVenda' => $request->precoVenda,
            'imposto' => $request->imposto,
        ]);

        Livro::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'numeroPaginas' => $request->numeroPaginas,
            'dataPublicacao' => $request->dataPublicacao,
            'nomeEditora' => $request->nomeEditora,
            'custo' => $request->custo,
            'precoVenda' => $request->precoVenda,
            'imposto' => $request->imposto,
            'editora_id' => $request->editora_id,
            'editora' => $request->editora,
            'detalhes_id' => $detalhe->id
        ]);

        return redirect()->back()->with('success','Livro cadastrado com sucesso!');
    }

    public function atualizar($id){
        $livro = Livro::with('detalhe')->findOrFail($id);
        $editoras = Editora::all();
        return view('atualizar', compact('livro','editoras'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:255',
            'numeroPaginas' => 'required|numeric|max:255',
            'dataPublicacao' => 'required|string|max:255',
            'nomeEditora' => 'required|string|max:255',
            'custo' => 'required|string|max:255',
            'precoVenda' => 'required|string|max:255',
            'imposto' => 'required|string|max:255',
            'editora' => 'required|string|max:255'
        ]);

        $livro = Livro::findOrFail($id);

        // Atualiza livro
        $livro->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'numeroPaginas' => $request->numeroPaginas,
            'dataPublicacao' => $request->dataPublicacao,
            'custo' => $request->custo,
            'precoVenda' => $request->precoVenda,
            'imposto' => $request->imposto,
            'editora' => $request->editora,
        ]);

        // Atualiza detalhe
        $livro->detalhe->update([
            'custo' => $request->custo,
            'precoVenda' => $request->precoVenda,
            'imposto' => $request->imposto,
        ]);

        return redirect()->back()->with('success','Livro atualizado com sucesso!');
    }

    public function deletar($id){
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return redirect()->route('livro.listar')->with('success','Livro excluído com sucesso!');
    }
} 