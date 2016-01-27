<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Crypt;
use Hash;
use Mail;
use \Illuminate\Validation\Factory as Validator;

class UserController extends Controller {

    private $request;
    private $user;
    private $validator;

    public function __construct(Request $request, User $user,Validator $validator) {
        $this->request = $request;
        $this->user = $user;
        $this->validator = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex() {
        $titulo = 'Usuários | Curso de Laravel 5';
        $users  = $this->user->paginate(5);
        $status = "";

        if ($this->request->session()->has('status'))
        {
            $status = $this->request->session()->get('status');
        }

        return view('painel.users.index', ['users' => $users, 'titulo' => $titulo, 'status'=> $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getAdicionar() {
        return view('painel.users.create-edit');
    }

    public function postAdicionar() {
        $dadosForm = $this->request->all();
        dd($dadosForm);

        $validator = $this->validator->make($dadosForm, User::$rules);
        if ($validator->fails()) {
            return redirect('users/adicionar')
            ->withErrors($validator)
            ->withInput();
        }

        $dadosForm['password'] = bcrypt($dadosForm['password']);
        $this->user->create($dadosForm)->save();

        $status = "Usuário ".$dadosForm['name']. " foi criado com sucesso!";

        $this->request->session()->flash('status',$status);

        //$this->dispararEmails($dadosForm['name']);


        return redirect('users');
    }

    public function getDeletar($idUser) {
        $this->user->find($idUser)->delete();

        return redirect('users');
    }

    public function getEditar($id) {
        $user = $this->user->find($id);

        $titulo = "Editar {$user->name} | Gestão do Usuário";

        return view('painel.users.create-edit', ['user' => $user, 'titulo' => $titulo]);
    }

    public function postEditar($id) {
        $dadosForm = $this->request->all();

        $rules = [
        'name' => 'required|min:3|max:150',
        'email' => "required|email|max:250|unique:users,email,$id",
        'password' => 'required|min:3|max:20',
        ];
        $validador = $this->validator->make($dadosForm, $rules);
        if( $validador->fails() ){
            return redirect("users/editar/$id")
            ->withErrors($validador)
            ->withInput();
        }
        $dadosForm = $this->request->except('_token');
        $dadosForm['password'] = bcrypt($dadosForm['password']);
        $this->user->where('id',$id)->update($dadosForm);


        return redirect('users');
    }

    private function dispararEmails($name) {

        Mail::send('emails.viewTesteEmail', ['name' => $name], function ($m){
            $m->to('igorfaria6@gmail.com', 'Aqui e o nome')
            ->subject('Novo usuario cadastrado')
            ->attach('http://wallpaper.ultradownloads.com.br/121350_Papel-de-Parede-Imagem-Abstrata_1920x1200.jpg');
        });
    }
    private function dispararEmailsFila($name) {

        $this->mail->queue('emails.viewTesteEmail', ['name' => $name], function ($m) use ($name) {
          $m->from('hello@app.com', 'Your Application');
          $m->to('igorfaria6@gmail.com', 'Nome do Usuario')->subject('Your Reminder!');
      });
    }

}
