<?php namespace Acme\Repositories\PostRepository;

use Post;
use User;

class DbPostRepository implements PostRepositoryInterface
{

	public function all()
	{
		$posts = Post::orderBy('id', 'DESC')->with('user')->get();

		return $posts;
	}


	public function find($id, $username = NULL)
	{
		$post = Post::with('user')->findOrFail($id);

		if ($username && $post->user->username !== $username) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}
			
		return $post;
	}


	public function getByUsername($username)
	{
		$posts = User::byUsername($username)->posts()->paginate(5);

		return $posts;
	}	


	public function paginate($quantity)
	{
		$posts = Post::orderBy('id', 'DESC')->with('user')->paginate($quantity);

		return $posts;
	}

}