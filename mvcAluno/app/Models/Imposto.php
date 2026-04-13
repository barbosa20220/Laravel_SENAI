<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Imposto extends Model
{
    protected $fillable = [
        'CNPJ',
        'Pais',
        'Cidade',
    ];

    public function biblioteca()
    {
        return $this->hasMany(Imposto::class);
    }

    
}
