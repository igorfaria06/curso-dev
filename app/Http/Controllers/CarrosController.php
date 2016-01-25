<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Painel\Carro;
use App\Models\Painel\CarrosMarca;
use App\Models\Painel\CarroChassis;
use App\Models\Painel\Cores;
use Illuminate\Http\Request;
use Validator;
use Cache;
use Crypt;

class CarrosController extends Controller
{
	private $request;
	private $carro;
	private $carrosMarca;
	private $carroChassis;
	private $cores;

	public function __construct(Request $request, Carro $carro, CarrosMarca $carrosMarca, CarroChassis $carroChassis, Cores $cores) {
		$this->request = $request;
		$this->carro = $carro;
		$this->carrosMarca = $carrosMarca;
		$this->carroChassis = $carroChassis;
		$this->cores = $cores;

	}


	public function getIndex(){
		$carros = $this->carro->paginate(2);

		$titulo = 'Listagem dos Carros';

		return view('painel.carros.index', compact('carros', 'titulo'));
	}

	public function getAdicionar(){
		$titulo = 'Adicionar Novo Carro';
		$marcas = $this->carrosMarca->lists('nome', 'id');
		$cores = DB::table('cores')->get();

		return view('painel.carros.create-edit', compact('titulo', 'marcas', 'cores', 'chassis'));
	}

	public function postAdicionar(){
		/*
		$carro = new Carro;
		$carro->nome = $request->input('nome');
		$carro->placa = $request->input('placa');
		$carro->save();
		*/
		$dadosForm = $this->request->except('file');
		dd($dadosForm);


		$validator = Validator::make($dadosForm, Carro::$rules);
		if( $validator->fails() ){
			return redirect('carros/adicionar')
			->withErrors($validator)
			->withInput();
		}
		$file = $this->request->file('file');

		if( $this->request->hasFile('file') && $file->isValid() ){
			if($file->getClientMimeType() == "image/jpeg" || $file->getClientMimeType() == "image/png"){
				$file->move('assets/uploads/images', $file->getClientOriginalName());
			}
		}
		$carro = $this->carro->create($dadosForm);

		return redirect("carros");
	}

	public function getEditar($idCarro){
		$carro = $this->carro->find($idCarro);
		$marcas = $this->carrosMarca->lists('marca', 'id');

		return view('painel.carros.create-edit', compact('carro', 'marcas'));
	}

	public function postEditar($idCarro){
		$dadosForm = $this->request->except('_token');
		$rules = [
		'nome' => 'required|min:3|max:150',
		'placa' => "required|min:7|max:7|unique:carros,placa,$idCarro",
		];

		$validator = Validator::make($dadosForm, $rules);
		if( $validator->fails() ){
			return redirect("carros/editar/$idCarro")
			->withErrors($validator)
			->withInput();
		}

		$this->carro->where('id', $idCarro)->update($dadosForm);

		return redirect('carros');
	}

	public function getDeletar($idCarro){
		$carro = $this->carro->find($idCarro);
		$carro->delete();

		return redirect('carros');
	}

	public function getListaCarrosLuxo(){
		return 'Listando os carros de luxo';
	}

	public function missingMethod($params = array()){
		return 'Erro 404, página não encontrada!';
	}

	public function getListarCarrosCache(){

		// Cache::put('carros', Carro::all() , 3);
		// $carros = Cache::get('carros','Nao existe carros');

		$carros = Cache::remember('carros', 3, function() {
			return Carro::all();
		});


		$titulo = Crypt::encrypt('Cache Carros');

		return view('painel.carros.cache', compact('carros','titulo'));

		//return $carros;
	}
}
