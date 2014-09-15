<?php namespace Acme\Repositories\CategoryRepository;

use Category;

class DbCategoryRepository implements CategoryRepositoryInterface
{

	public function all()
	{
		return Category::lists('id', 'name');
	}

	public function byName($name)
	{
		return Category::whereName($name)->firstOrFail()->posts();
	}

}