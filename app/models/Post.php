<?php 

class Post extends Eloquent
{

	protected $guarded = ['id'];

	/**
	 * undocumented function
	 *
	 * @return Many-to-many relationship
	 * @author 
	 **/
	public function categories()
	{
		return $this->belongsToMany('Category', 'post_category', 'post_id', 'category_id');
	}


	public function user()
	{
		return $this->belongsTo('User');
	}


	public static function find($id, $username = NULL)
	{
		$post = static::with('user')->findOrFail($id);

		if ($username && $post->user->username !== $username) {
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;
		}
			
		return $post;
	}
	

	public static function getByUsername($username)
	{
		$posts = User::byUsername($username)->posts()->paginate(5);

		return $posts;
	}	


	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function assignToCategory($postId, $categoryId)
	{
		$post = Post::findOrFail($postId);

		return $post;
	}
}