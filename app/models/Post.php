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

}