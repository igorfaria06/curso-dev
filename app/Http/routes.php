<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});

Route::get('produtos', 'ProdutoController@index');

Route::get('produtos', 'ProdutoController@create');

Route::post('produtos', 'ProdutoController@store');

Route::get('produtos/{idProd}', 'ProdutoController@show');

Route::get('produtos/{idProd}/{idProd2}', 'ProdutoController@showTwo');

Route::controller('/carros', 'CarrosController');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
