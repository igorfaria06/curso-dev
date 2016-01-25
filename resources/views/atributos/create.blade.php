@extends('painel.templates.index')

@section('content')
	<h1>Gestão dos Atributos</h1>

	{!!Form::open( ['url' => "atributos/adicionar/$categoria", 'files' => true, 'class' => 'form'] )!!}
		{!!Form::text('nome', null , ['placeholder' => 'Nome do Usuário', 'class' => 'form-control form-group'] )!!}
		{!!Form::submit('Enviar', ['class' => 'btn btn-default form-control form-group'])!!}
		{!!  HTML::link('atributos', 'Voltar', ['class' => 'btn btn-danger form-control form-group']) !!}
	{!!Form::close()!!}
@endsection
