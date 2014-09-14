<?php

class Category extends Eloquent
{
	
	public function parent()
	{
		return $this->hasOne('Category');
	}

	public function siblings()
	{
		return $this->hasMany('Category');
	}

	public function items()
	{
		return $this->hasMany('Post');
	}

}