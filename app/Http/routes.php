<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('/contato', function(){
	return 'Página de Contato';
});


Route::get('empresa', function(){
	return 'Página Empresa';
});

Route::post('cadastrar/user', function(){
	return 'Cadastrando usuário...';
});

Route::match(['post', 'get'], '/match', function(){
	return 'Minha Rota match';
});


Route::any('any', function(){
	return 'Rota do Tipo Any';
});


Route::get('produtos', function(){
	return 'Listagem dos produtos';
});

Route::get('produto/adicionar', function(){
	return 'Form Add Prod';
});

Route::get('produto/editar/{idProduto}', function($idProduto){
	return "Editar o Produto => {$idProduto}";
})
->where('idProduto', '[0-9]+');


Route::get('produto/deletar/{idProduto?}', function($idProduto = ''){
	return "Deletar O produto => {$idProduto}";
});

Route::get('produto/{idProduto}/imagem/{idImagem}', function($idProduto, $idImagem){
	return "Produto => {$idProduto}, e imagem -> {$idImagem}";
});



Route::group(['prefix' => 'painel', 'middleware' => 'my-middleware'], function(){

	Route::get('/', function(){
		return view('painel.home.index');
	});

	Route::get('financeiro', function(){
		return view('painel.financeiro.index');
	});

	Route::get('usuarios', function(){
		return 'Usuário';
	});

});


Route::get('/login', function(){
	return 'Formulário de Login';
});
*/
Route::get('produtos', 'ProdutoController@index');
Route::get('produto/create', 'ProdutoController@create');
Route::post('produto/create', 'ProdutoController@store');
Route::get('produto/{idProd}', 'ProdutoController@show');
Route::get('produto/edit/{idProd}', 'ProdutoController@edit');


Route::controller('carros', 'CarrosController');

Route::controller('users', 'UserController');

Route::get('sessao/gravar', function(){

	echo "GRAVAR: Gravando sessão";
	session(['msg'=>'Gravando sessão no Laravel!']);

});

Route::get('sessao/exibir', function(){

	$msg = session('msg');

	return $msg;
});

Route::get('email', function(){

	Mail::raw('Mensagem de texto puro', function($m){
		$m->to('igorfaria6@gmail.com', 'Joao')->subject('Novo usuario cadastrado');
	});
});


Route::controller('collection', 'CollectionController');

Route::get('services', function(){
	dd(App::make('geraLog', [1,2,3,4,5,6,7]));

	return 'services';
});
Route::controller('atributos', 'AtributosController');
