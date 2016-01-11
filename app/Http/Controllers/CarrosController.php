<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Curso\Carro;

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
		Carro::create($dadosForm);
		return redirect('carros');
	}

	public function getEdit($idCarro){
		$carro = Carro::find($idCarro);
	return view('curso.carros.create-edit', compact('carro'));
		}

		public function postEdit($idCarro){
		return 'editando';
	}

}
