@extends('layouts.master')

@section('content')
	
<h2 class="title">{{ $post->title }}</h2>

<article class="post">{{ nl2br($post->body, false) }}</article>

@if (Auth::check() && credentialsMatch(Auth::user()->username))
	{{ link_to_route('posts.edit', 'Edit', ['username' => Auth::user()->username, 'id' => $post->id]) }}
@endif

@if('categories')
	@include('partials._categories')
@endif

{{ link_to(URL::previous(), 'Go back') }}

@stop