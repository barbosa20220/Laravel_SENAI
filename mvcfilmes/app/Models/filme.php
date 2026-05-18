<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Filme extends Model
{
    protected $fillable = [
        'titulo',
        'data_lançamento',
        'sinopse',
        'genero',
        'orçamento',
        'autores_id'
    ];

    public function setor(){
        return $this->belongsTo(Setores::class);
    }

    public function detalhe(){
        return $this->hasMany(detalheProduto::class);
    }
}