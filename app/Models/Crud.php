<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    protected $table = 'place';
    protected $fillable = [
        'nome',
        'cep',
        'logradouro',
        'complemento',
        'numero',
        'bairro',
        'uf',
        'cidade',
        'data',
    ];
}
