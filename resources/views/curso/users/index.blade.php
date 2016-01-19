<!-- USERS -->
@extends('curso.templates.index')

@section('content')


<div class="jumbotron"><h1>Dashboard Usuarios </h1></div>

<h2> Usuarios ({{$users->total()}}) </h2>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th style='width:130px'>Açoes</th>
		</tr >
	</thead>

	<tbody>
		@forelse ($users as $user)
		<tr>
			<th>{{$user->name}}</th>
			<th>{{$user->email}}</th>
			<th>{!! Html::link("users/edit/{$user->id}", 'Editar') !!}  |  {!!  Html::link("users/delete/{$user->id}", 'Deletar') !!}</th>
		</tr>
		@empty
		<p> Nenhum carro cadastrado </p>
		@endforelse
	</tbody>
</table>

<div class='row'>
	<div class="col-md-4 col-md-offset-4">
		{{$users->render()}}
	</div>
</div>
{!! Html::link('users/create', 'Adicionar novo usuario', ['class' => 'btn btn-default btn-xs'])  !!}

@endsection
