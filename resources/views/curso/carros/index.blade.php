@extends('curso.templates.index')

@section('slide')

Conteudo Slide
@parent

@endsection



@section('content')
<h1> Index do Carros </h1>


@forelse ($carros as $carro)
<p> <b>Nome:</b> {{$carro->nome}}  ({{$carro->placa}})  {!! Html::link("carros/edit/{$carro->id}", 'Editar') !!}</p>
@empty <p> Nenhum carro cadastrado </p>
@endforelse
@endsection