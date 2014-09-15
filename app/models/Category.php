<?php

class Category extends Eloquent
{

	protected $guarded = ['id', 'created_at', 'updated_at'];
	protected $hidden = ['created_at', 'updated_at'];

	public function posts()
	{
		return $this->belongsToMany('Post', 'post_category');
	}


}