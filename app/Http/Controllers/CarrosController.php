<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\Carro;

class CarrosController extends Controller
{

	public function getIndex(){
		$carros = Carro::get();

		return view('curso.carros.index', compact('carros'));
	}

	public function getCreate(){
		return view('curso.carros.create-edit');
	}

	public function getEdit(){
		return view('curso.carros.create-edit');
	}
}