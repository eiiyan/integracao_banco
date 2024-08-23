<?php

namespace App\Http\Controllers;

use App\Service\UsuarioServece;
use App\Service\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    protected $usuarioService; // vai receber a instância da classe Service

    public function __construct(UsuarioService $novoUsuarioService) // método construtor dá liberdade de acessar os atributos da classe
    {
        $this->usuarioService = $novoUsuarioService; //acessar a classe e depois acessar a função

    } 

    public function store(Request $request)
    {
       $user = $this->usuarioService->create($request->all()); // recebe o resultado da funçãocreate e os dados da request

       return $user; 


    }
}
