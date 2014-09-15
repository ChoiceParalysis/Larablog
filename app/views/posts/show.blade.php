@extends('layouts.master')

@section('content')
	
<h2 class="title">{{ $post->title }}</h2>

<article class="post">{{ nl2br($post->body, false) }}</article>

@if(count($post->categories->toArray()))
	@include('partials._categories')
@endif

@if (credentialsMatch($post->user->username))
	{{ link_to_route('posts.edit', 'Edit', ['username' => Auth::user()->username, 'id' => $post->id]) }}
@endif


{{ link_to(URL::previous(), 'Go back') }}



@stop