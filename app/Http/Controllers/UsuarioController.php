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

    public function findById($id){
        $result = $this->usuarioService->findById($id); 

        return response()->json($result); // resposta para json 

    }

    public function index(){
        $result = $this->usuarioService->getAll(); // não recebe nenhum parâmetro pois não vai pesquisar por nada

        return response()->json($result);
        
    }

    public function searchByName(Request $request){ // request porque vai pesquisar pelo nome
        $result = $this->usuarioService->searchByName($request->email);

        return response()->json($result);

        
    }

    public function searchByEmail(Request $request){
        $result = $this->usuarioService->searchByEmail($request->email); // tudo que tem entrada recebe uma request

        return response()->json($result);

    }

    public function delete($id){
        $result = $this->usuarioService->delete($id);

        return response()->json($result);


    }

    public function update(Request $request){
        $result = $this->usuarioService->update($request->all()); // todos os dados da request

        return response()->json($result);

    }

}
