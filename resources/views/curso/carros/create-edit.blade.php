@extends('curso.templates.index')

@section('content')
	<div class="jumbotron"><h1> <?= (isset($carro) ? 'Edit' : 'Create') ?> Carros </h1></div>
	@if ( isset($carro))
		{!!Form::open( ['url' => 'carros/edit/{$carro->id}', 'class' => 'form form-horizontal form-group', 'style' => 'padding-left: 15px;'])!!}
	@else
		{!!Form::open( ['url' => 'carros/create', 'class' => 'form form-horizontal form-group', 'style' => 'padding-left: 15px;'])!!}
	@endif
	{!!Form::text('nome', (isset($carro->nome) ? $carro->nome : null), ['placeholder' => 'Nome do Carro', 'class' => 'form-control form-group'])!!}
	{!!Form::text('placa', (isset($carro->placa) ? $carro->placa : null), ['placeholder' => 'Placa do Carro', 'class' => 'form-control form-group'])!!}
	{!!Form::file('file', ['class' => 'form-group'])!!}
	{!!Form::submit('Enviar', ['class' => 'btn btn-success form-group'])!!}
	{!!Form::close()!!}

	{!! Html::link('carros', 'Voltar', ['class' => 'btn btn-danger btn-xs'])  !!}
@endsection
