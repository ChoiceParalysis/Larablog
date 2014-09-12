@extends('layouts.master')

@section('content')

	{{ Form::open(['action' => 'posts.store']) }}

	<div class="form-group">
	{{ Form::label('title', 'Title:') }}
	{{ Form::text('title', null, ['class' => 'form-control']) }}
	{{ $errors->first('title', '<div class="error">:message</div>') }}
	</div>

	<div class="form-group">
	{{ Form::label('body', 'Title:') }}
	{{ Form::textarea('body', null, ['class' => 'form-control']) }}
	{{ $errors->first('body', '<div class="error">:message</div>') }}
	</div>

	<div class="form-group">
	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	</div>

	{{ Form::close() }}

@stop