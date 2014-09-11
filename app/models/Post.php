<?php 

class Post extends Eloquent
{

	protected $guarded = ['id'];
	
	public function user()
	{
		return $this->belongsTo('User');
	}

	public static function find($id, $username = NULL)
	{
		$post = Post::whereId($id)->firstOrFail();
  
		if ($username && $post->user->username !== $username)
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;

		return $post;
		
	}
	
}