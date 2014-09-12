@extends('layouts.master')

@section('content')
	
<h2 class="title">{{ $post->title }}</h2>

<article class="post">{{ $post->body }}</article>

{{ link_to(URL::previous(), 'Go back') }}

@stop