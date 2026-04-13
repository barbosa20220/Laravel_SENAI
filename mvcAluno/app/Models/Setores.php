<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Setores extends Model 
{
    protected $fillable = [
        'CNPJ',
        'Pais',
        'Cidade',
    ];

    public function Setores()
    {
        return $this->hasMany(Biblioteca::class);
    }
}