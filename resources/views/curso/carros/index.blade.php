@extends('curso.templates.index')

<!-- ESTOU COMEÇANDO -->
@section('content')
<div class="jumbotron"><h1>Dashboard Carros </h1></div>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Placa</th>
			<th style='width:130px'>Açoes</th>
		</tr >
	</thead>

	<tbody>
		@forelse ($carros as $carro)
		<tr>
			<th>{{$carro->nome}}</th>
			<th>{{$carro->placa}}</th>
			<th>{!! Html::link("carros/edit/{$carro->id}", 'Editar') !!}  |  {!!  Html::link("carros/delete/{$carro->id}", 'Deletar') !!}</th>
		</tr>
		@empty
		<p> Nenhum carro cadastrado </p>
		@endforelse
	</tbody>
</table>
<div class='row'>
	<div class="col-md-4 col-md-offset-4">
		{{$carros->render()}}
	</div>
</div>
{!! Html::link('carros/create', 'Adicionar novo carro', ['class' => 'btn btn-default btn-xs'])  !!}

@endsection
