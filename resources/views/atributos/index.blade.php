@extends('painel.templates.index')

@section('slide')
@parent
@endsection


@section('content')
<p>{!!HTML::link('atributos/adicionar/marca', 'Cadastrar Nova Marca', ['class' => 'btn btn-success'])!!}</p>
<p>{!!HTML::link('atributos/adicionar/cor', 'Cadastrar Nova Cor', ['class' => 'btn btn-default'])!!}</p>

<h1>Listagem dos Atributos</h1>

<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered">
			<tr>
				<th>Nome</th>
				<th>Id</th>
				<th width="150">Ações</th>
			</tr>
			{{-- Listagem dos carros --}}
			@forelse( $marcas as $marca )
			<tr>
				<td>{{$marca->nome}}</td>
				<td>{{$marca->id}}</td>
				<td>{!! HTML::link("atributos/deletar/marca/$marca->id", 'Deletar') !!} </td>

			</tr>
			@empty
			<p>Nenhum Carro Cadastrado!</p>
			@endforelse
		</table></div>
		<div class="col-md-6">
			<table class="table table-bordered">
				<tr>
					<th>Nome</th>
					<th>Id</th>
					<th width="150">Ações</th>
				</tr>
				{{-- Listagem dos carros --}}
				@forelse( $cores as $cor )
				<tr>
					<td>{{$cor->nome}}</td>
					<td>{{$cor->id}}</td>
					<td>{!! HTML::link("atributos/deletar/cor/$cor->id", 'Deletar') !!} </td>
				</tr>
				@empty
				<p>Nenhum Carro Cadastrado!</p>
				@endforelse
			</table>
		</div>
	</div>

	{{-- Inclusão da página de captura de e-mail --}}
	@include('painel.includes.email')

	@endsection
