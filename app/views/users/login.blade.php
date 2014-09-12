@extends('layouts.master')

@section('content')

	{{ Form::open(['action' => 'users.auth']) }}

	<div class="form-group">
		{{ Form::label('username', "Username") }}
		{{ Form::text('username', null, ['class' => 'form-control']) }}
		{{ $errors->first('username', '<div class="error">:message</div>') }}
	</div><!-- end form-group -->

	<div class="form-group">
		{{ Form::label('password', "Password") }}
		{{ Form::password('password', ['class' => 'form-control']) }}
		{{ $errors->first('password', '<div class="error">:message</div>') }}
	</div><!-- end form-group -->

	{{ $errors->first('auth', '<div class="error">:message</div>') }}

	<div class="form-group">
		{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
	</div><!-- end form-group -->



	{{ Form::close() }}

@stop