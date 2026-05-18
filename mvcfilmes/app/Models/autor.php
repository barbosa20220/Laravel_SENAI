<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Autor extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'e-mail',
        'telefone',
    ];

    public function detalhe(){
        return $this->belongsTo(Produto::class);
    }
}