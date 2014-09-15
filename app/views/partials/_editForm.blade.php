dd($categories);

@section('content')

	{{ Form::model($post, ['method' => 'PATCH', 'route' => ['posts.update', Auth::user()->username, $post->id]]) }}

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
	{{ Form::label('category_id', 'Categories:') }}

	@foreach($categories as $title => $value)
		{{ Form::label('category_id[]', $title) }}
		{{ Form::checkbox('category_id[]', $value) }}
	@endforeach

	{{ $errors->first('category_id', '<div class="error">:message</div>') }}
	</div>

	<div class="form-group">
	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	</div>

	{{ Form::close() }}

@stop