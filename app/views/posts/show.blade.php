@extends('layouts.master')

@section('content')
	
<h2 class="title">{{ $post->title }}</h2>

<article class="post">{{ nl2br($post->body, false) }}</article>


<div class="categories">
	<p class="categories-headline">This post belongs to the following categories: </p>

	<ul>
	@foreach($post->categories as $category)
		<li>{{ $category->name }}</li>
	@endforeach
	</ul>
</div><!-- end categories -->

{{ link_to(URL::previous(), 'Go back') }}

@stop