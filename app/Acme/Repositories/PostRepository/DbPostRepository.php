<?php namespace Acme\Repositories\PostRepository;

use Post;

class DbPostRepository implements PostRepositoryInterface
{

	public function all()
	{
		$posts = Post::with('user')->get();

		return $posts;
	}

	public function find($id, $username = NULL)
	{
		$post = Post::findOrFail($id);

		return $post;
	}

	public function paginate($quantity)
	{
		$posts = Post::with('user')->paginate($quantity);

		return $posts;
	}

}