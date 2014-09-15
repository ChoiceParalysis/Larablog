@extends('layouts.master')

@section('content')

	<h2 class="profile-heading">{{ $user->username }}'s profile</h2>

	@if(credentialsMatch($user->username))
	<ul class="user-menu">
		<li class="user-menu-item">{{ link_to_route('post.create', 'Create a new post', ['username' => $user->username]) }}</li>
		<li class="user-menu-item">{{ link_to_route('logout', 'Logout') }}</li>
	</ul>
	@endif

@stop