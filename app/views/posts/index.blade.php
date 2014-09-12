@extends('layouts.master')

@section('content')

	<ul class="list-group">
		@foreach($posts as $post)
			<li class="list-group-item">{{ link_to("/users/" . $post->user->username . "/posts/$post->id", $post->title) }}</li>
		@endforeach
	</ul><!-- end list-group -->

	{{ $posts->links(); }}

@stop