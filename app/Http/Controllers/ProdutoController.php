<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    /**
    *Método para listar dados
    *
    * @return Response
    */
    public function index(){
    	return view('curso.produtos.index');
    }

    /**
    * Mostra formulário de cadastro de dados
    *
    * @return Response
    */
    public function create(){
    	return view('curso.produtos.create');
    }

    /**
    *Método criaçao
    *
    * @param Request $request
    * @return Response
    */
    public function store(Request $request){

    }

    /**
    *Método para mostrar determinado dado
    *
    * @param int $id
    * @return Response
    */
    public function show($id){
    	return "teste   {$id}";
    }
     public function showTwo($id, $id2){
    	return "teste <br> -> {$id} <br> -> {$id2}";
    }

    /**
    *Método para carregar determinado dado
    *
    * @param int $id
    * @return Response
    */
    public function edit($id){

    }

     /**
    *Método para carregar e alterar determinado dado
    *
    * @param Resquest $request
    * @param int $id
    * @return Response
    */
    public function update(Request $request, $id){

    }

 /**
    *Método para deletar determinado dado
    *
    * @param int $id
    * @return Response
    */
    public function destroy($id){

    }


}
