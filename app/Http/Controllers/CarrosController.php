<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Curso\Carro;
use Validator;
use Cache;

class CarrosController extends Controller
{

	public function getIndex(){
		$carros = Carro::paginate(6);
		$titulo = 'Listagem dos carros';
		return view('curso.carros.index', compact('carros'));
	}

	public function getCreate(){
		return view('curso.carros.create-edit');
	}

	public function postCreate(Request $request){
		$dadosForm = $request->except('file');
		$rules = [
		'nome' => 'required|min:2|max:5',
		'placa' => 'required|min:3|max:3'
		];
		$validacao = Validator::make($dadosForm, $rules);

		$file = Input::file('file');
		$dd($file);
		if ($file != ""):
			$fileArray->move('assets/uploads/images', $file);
		endif;


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
	public function missingMethod($params = array()){
		return '404';
	}
	public function getListCarrosCache(){
		Chace::put('carros', Carro::all(), 3);
	}


}
