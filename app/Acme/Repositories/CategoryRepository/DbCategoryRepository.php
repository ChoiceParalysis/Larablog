<?php namespace Acme\Repositories\CategoryRepository;

use Category;

class DbCategoryRepository implements CategoryRepositoryInterface
{

	public function byName($name)
	{
		return Category::whereName($name)->firstOrFail()->posts();
	}

}