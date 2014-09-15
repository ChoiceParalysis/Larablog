<?php namespace Acme\Repositories\CategoryRepository;

use Category;

class DbCategoryRepository implements CategoryRepositoryInterface
{

	public function all()
	{
		return Category::lists('name', 'id');
	}

	public function byName($name)
	{
		return Category::whereName($name)->firstOrFail()->posts();
	}

	public function getFromPost($post)
	{
		foreach($post->categories->toArray() as $category)
		{
			$postCategories[] = $category['name'];
		}

		return $postCategories;
	}

}