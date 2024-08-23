<?php

namespace App\Service;

use App\Models\Usuario;

class UsuarioService // criando a função da classe UsuarioService que armazena todas as funções 

{
    public function create(array $dados){  //comunicação com o banco, recebe o array
        $user = Usuario::create([  
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => $dados['password']
        ]) ;
        
        return $user; // retornar a variável user, voltando a respost para a store

    }

    public function update(){

    }

    public function delete(){

    }

    public function findById(){

    }

    public function getAll(){

    }

    public function searchByName(){

    }
    
}