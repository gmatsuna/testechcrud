<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'descricao',
        'status',
        'endereco',
        'telefone',
        'celular'
    ];    
}

