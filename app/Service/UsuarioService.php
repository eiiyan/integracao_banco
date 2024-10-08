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

    public function update(array $dados){
        $usuario = Usuario::find($dados['id']);

        if($usuario == null){
            return[
                'status' => false,
                'message' => 'Usuário não encontrado',
            ];
    
        }

        if (isset($dados['password'])){// isset verifica se a chave existe dentro do array, se existir os dados ainda continuam no insomnia
            $usuario->password = $dados['password'];
        }  

        if(isset($dados['nome'])){
            $usuario->nome = $dados['nome'];
        }

        if(isset($dados['email'])){
            $usuario->email = $dados['email'];
        }

        $usuario->save();

        return [
            'status'=> true,
            'message'=> 'Atualizado com sucesso'
        ];

    }

    public function delete($id){
        $usuario = Usuario::find($id);

        if($usuario == null){ //pesquisa pra ver se a variável é nula 
            return [
                'status' => false,
                'message' => 'Usuário não encontrado'

            ];
        }
        
        $usuario->delete(); 

        return [
            'status' =>true,
            'message'=>'Usuário excluído com sucesso'
        ];


    }

    public function findById($id){
        $usuario = Usuario::find($id); //find faz a busca exclusivamente por id

        if($usuario == null){
            return [
                'status' => false,
                'message' => 'Usuário não encontrado'

            ];
        }

        return [
            'status' => true,
            'message' => 'Usuário encontrado',
            'data' => $usuario
        ];


    }

    public function getAll(){
        $usuarios = Usuario::all();

        return [
            'status' =>true,
            'message' => 'Pesquisa efetuada com sucesso',
            'data' => $usuarios
        ];

    }

    public function searchByName($nome){
        $usuarios = Usuario::where('nome' , 'like' , '%' .  $nome . '%')->get(); //idêntico ao sql, porém, com variável e função

        if($usuarios->isEmpty()){
            return[
                'status'=>false,
                'message'=> 'Sem Resultados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Resultados Encontrados',
            'data'=> $usuarios
        ];


    }

    public function searchByEmail($email){
        $usuarios = Usuario::where('email' , 'like' , '%' .  $email . '%')->get();

        
        if($usuarios->isEmpty()){
            return[
                'status'=>false,
                'message'=> 'Sem Resultados'
            ];
        }

        return [
            'status'=> true,
            'message'=> 'Resultados Encontrados',
            'data'=> $usuarios
        ];

    }

    
}