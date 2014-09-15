
@section('categories')

<div class="categories">
	<p class="notification">This post belongs to the following categories: </p>

	<ul>
	@foreach($post->categories as $category)
		<li>{{ link_to_route('categories.index', $category->name, ['category' => $category->name]) }}</li>
	@endforeach
	</ul>
</div><!-- end categories -->

@show