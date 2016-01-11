@extends('curso.templates.index')

@section('content')

<h1> Create Edit Carros </h1>
	{{$carro->nome}}
	@if ( isset($carro))
		{!!Form::open( ['url' => "carros/edit/{$carro->id}"])!!}
	@else
		{!!Form::open( ['url' => 'carros/create'])!!}
	@endif
	{!!Form::text('nome', (isset($carro->nome) ? $carro->nome : 'null'), ['placeholder' => 'Nome do Carro'])!!}
	{!!Form::text('placa', (isset($carro->placa) ? $carro->placa : 'null'), ['placeholder' => 'Placa do Carro'])!!}
	{!!Form::submit('Enviar')!!}
	{!!Form::close()!!}
@endsection
