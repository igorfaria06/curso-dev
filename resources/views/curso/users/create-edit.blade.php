<!--  USERS -->
@extends('curso.templates.index')

@section('content')
	<div class="jumbotron"><h1> <?= (isset($user) ? 'Edit' : 'Create') ?> User </h1></div>

	@if ( isset($user))
		{!!Form::open( ['url' => "users/edit/{$user->id}", 'class' => 'form form-horizontal form-group', 'style' => 'padding-left: 15px;'])!!}
	@else
		{!!Form::open( ['url' => 'users/create', 'class' => 'form form-horizontal form-group', 'style' => 'padding-left: 15px;'])!!}
	@endif
		{!!Form::text('name', (isset($user->name) ? $user->name : null), ['placeholder' => 'Nome do Usuario', 'class' => 'form-control form-group'])!!}
		{!!Form::email('email', (isset($user->email) ? $user->email : null), ['placeholder' => 'Email do Usuario', 'class' => 'form-control form-group'])!!}
		{!!Form::password('password', ['placeholder' => 'Digite aqui sua senha', 'class' => 'form-control form-group'])!!}

		<!--{!!Form::file('file', ['class' => 'form-group'])!!}-->
	@if(isset($erro))
		{!!Form::text('disabled', "{$erro}", ['type' => 'disabled', 'disabled', 'class' => 'form-control form-group'])!!}
	@endif
		{!!Form::submit('Enviar', ['class' => 'btn btn-success form-group'])!!}
		{!!Form::close()!!}

		{!! Html::link('users', 'Voltar', ['class' => 'btn btn-danger btn-xs'])  !!}
@endsection
