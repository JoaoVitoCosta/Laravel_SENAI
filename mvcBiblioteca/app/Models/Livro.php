<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model{

    protected $fillable = [
        'nome',
        'descricao',
        'numeroPaginas',
        'dataPublicacao',
        'custo',
        'precoVenda',
        'imposto',
        'editora',
        'editora_id',
        'detalhes_id'
    ];

    public function editora(){
        return $this->belongsTo(Editora::class);
    }

    public function detalhe(){
        return $this->belongsTo(DetalheLivro::class, 'detalhes_id');
    }
}