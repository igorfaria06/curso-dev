<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Crypt;
use DB;
use Hash;
use Validator;

class UserController extends Controller
{
	private $request;
	private $user;


	public function __construct(Request $request, User $user){
		$this->request = $request;
		$this->user = $user;
	}


	public function getIndex(){
		$users = User::paginate(9);
		return view('curso.users.index', ['users' => $users]);
	}

	public function getCreate(){
		return view('curso.users.create-edit');
	}

	public function postCreate(Request $request){
		$dadosUser = $request->all();
		$validator = Validator::make($dadosUser, User::$rules);
		$dadosUser['password'] = Crypt::encrypt('$dadosUser->password');
		if($validator->fails()){
			$erro = $validator->errors();
			return view('curso.carros.create-edit', compact('erro'));
		}

		User::create($dadosUser);

		return redirect('/users');
	}
	public function getEdit($idUser){
		$user = User::find($idUser);
		return view('curso.users.create-edit', compact('user'));
	}
	public function postEdit(Request $request, $idUser){
		$dataUser = $request->except('_token');
		$validator = Validator::make($dadosUser, User::$rules);
		$dadosUser['password'] = Crypt::encrypt('$dadosUser->password');
		if($validator->fails()){
			$erro = $validator->errors();
			return view('curso.carros.create-edit', compact('erro'));
		}
		User::where('id', $idUser)->update($dataUser);
		return redirect('users');
	}

	public function getDelete($idUser){
		$user = User::find($idUser);
		$user->delete();
		return redirect('users');
	}

	public function missingMethod($params = array()){
		return '404';
	}
}
