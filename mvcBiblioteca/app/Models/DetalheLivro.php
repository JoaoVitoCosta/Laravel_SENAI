<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalheLivro extends Model{

    protected $table = 'detalhesLivro';

    protected $fillable = [
        'custo',
        'precoVenda',
        'imposto'
    ];

    public function livros(){
        return $this->hasMany(Livro::class);
    }
}