<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function listar(){
        $produtos = Produto::all();
        return view('listar', compact('produtos'));
    }

    public function add(Request $request){
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'dataValidade'=> 'required|date|unique:produtos,dataValidade',
            'categoriaProduto' => 'required|string|max:255'
        ]);

        Produto::create([
            'nomeProduto' => $request->nomeProduto,
            'dataValidade' => $request->dataValidade,
            'categoriaProduto' => $request->categoriaProduto
        ]);

        return redirect()->back()->with('success','Produto cadastrado com sucesso!');
    }

    public function atualizar($id){
        $produto = Produto::findOrFail($id);
        return view('atualizar', compact('produto'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nomeProduto' => 'required|string|max:255',
            'dataValidade' => "required|date|unique:produtos,dataValidade,$id",
            'categoriaProduto'=> 'required|string|max:255'
        ]);

        $produto = Produto::findOrFail($id);

        $produto->nomeProduto = $request->nomeProduto;
        $produto->dataValidade = $request->dataValidade;
        $produto->categoriaProduto = $request->categoriaProduto;

        $produto->save();

        return redirect()->back()->with('success','Produto atualizado com sucesso');
    }
}