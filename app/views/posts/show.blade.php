@extends('layouts.master')

@section('content')
	
<h2 class="title">{{ $post->title }}</h2>

<article class="post">{{ $post->body }}</article>

<h5>This post belongs to the following categories: </h5>

<ul>
@foreach($post->categories as $category)
	<li>{{ $category->name }}</li>
@endforeach
</ul>

{{ link_to(URL::previous(), 'Go back') }}

@stop