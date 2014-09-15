@extends('layouts.master')

@section('content')

	<h2>Hello, {{ $user->username }}</h2>

	@if(credentialsMatch($user->username))
		{{ link_to_route('post.create', 'Create a new post', ['username' => $user->username]) }}
	@endif

@stop