<?php

class Producao extends Model
{
    protected $fillable = [
        'nome',
        'tipo_materia_prima',
        'data_fabricacao',
        'quantidade',
        'preco_venda'
    ];
}