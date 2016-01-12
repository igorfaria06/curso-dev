<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Curso\Carro;
use Validator;

class CarrosController extends Controller
{

	public function getIndex(){
		$carros = Carro::get();
		$titulo = 'Listagem dos carros';

		return view('curso.carros.index', compact('carros'));
	}

	public function getCreate(){
		return view('curso.carros.create-edit');
	}

	public function postCreate(Request $request){
		$dadosForm = $request->all();
		$rules = [
			'nome' => 'required|min:2|max:12',
			'placa' => 'required|min:7|max:7',
		];

		$validacao = Validator::make($dadosForm, $rules);
		if($validacao->fails()){
			return redirect('carros/create')
							->withErrors($validacao)
							->withInput();
		}

		Carro::create($dadosForm);
		return redirect('carros');
	}

	public function getEdit($idCarro){
		$carro = Carro::find($idCarro);
	return view('curso.carros.create-edit', compact('carro'));
		}

		public function postEdit(Request $request, $idCarro){
		$dadosForm = $request->except('_token');
		Carro::where('id' , $idCarro)->update($dadosForm);

		return redirect ('carros');
	}
	public function getDelete($idCarro){
		$carro = Carro::find($idCarro);
		$carro->delete();
	return redirect('carros');
		}

}
