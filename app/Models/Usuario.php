<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // importações de classes diferentes
use Illuminate\Database\Eloquent\Model; 

class Usuario extends Model
{
    use HasFactory; // Criando as características do Usuário

    protected $fillable = [  // protege os dados de ataque em massa, obrigação do laravel
        'nome', 
        'email',
        'password'
    ];
}
