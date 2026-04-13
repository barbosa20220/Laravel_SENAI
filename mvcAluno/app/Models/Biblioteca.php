<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Biblioteca extends Model
{
    protected $fillable = [
        'nome',
        'Autor',
        'Descricao',
        'NumeroPáginas',
        'DataPublicaçao',
        'Editora',
        'Custo',
        'Preço',
        'Imposto_id'
    ];

    public function Imposto()
    {
        return $this->belongsTo(Imposto::class);
    }
}
