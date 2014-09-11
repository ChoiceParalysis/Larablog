@extends('layouts.master')

@section('content')

	{{ Form::open() }}

	<div class="form-group">
		{{ Form::label('username', "Username") }}
		{{ Form::text('username', null, ['class' => 'form-control']) }}
	</div><!-- end form-group -->

	<div class="form-group">
		{{ Form::label('password', "Password") }}
		{{ Form::password('password', ['class' => 'form-control']) }}
	</div><!-- end form-group -->

	<div class="form-group">
		{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
	</div><!-- end form-group -->

	{{ Form::close() }}

@stop