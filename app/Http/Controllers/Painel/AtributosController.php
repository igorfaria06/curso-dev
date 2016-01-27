<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Models\Painel\CarrosMarca;
use App\Models\Painel\Cores;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AtributosController extends Controller
{
    private $request;
    private $carrosMarca;
    private $cores;

    public function __construct(Request $request, CarrosMarca $carrosMarca, Cores $cores){
        $this->request = $request;
        $this->carrosMarca = $carrosMarca;
        $this->cores = $cores;
    }


    public function getIndex(){
        $marcas = $this->carrosMarca->get();
        $cores = $this->cores->get();
        return view('atributos.index', compact('marcas', 'cores'));
    }


    public function getAdicionar($categoria){
        return view('atributos.create', compact('categoria'));
    }

    public function postAdicionar($categoria){
        $dadosForm = $this->request->only('nome');

        if($categoria == 'cor'):
            $criar = $this->cores->create($dadosForm);
        elseif($categoria == 'marca'):
            $criar = $this->carrosMarca->create($dadosForm);
        else:
          return 'Erro ao cadastrar';
      endif;
      return redirect("atributos/adicionar/{$categoria}");
  }

  public function getDeletar($categoria, $id){

    if($categoria == 'cor'):
        $deletar = $this->cores->find($id);
        $deletar->delete();
    elseif($categoria == 'marca'):
        $deletar = $this->carrosMarca->find($id);
        $deletar->delete();
    else:
        return 'Erro ao deletar';
    endif;
    return redirect('atributos');

}



}
