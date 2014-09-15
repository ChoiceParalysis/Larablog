<?php

use Acme\Repositories\CategoryRepository\DbCategoryRepository;

class CategoryController extends BaseController
{

	protected $categoryRepository;
	
	public function __construct(DbCategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}

	public function index($name)
	{	
		$posts = $this->categoryRepository->byName($name)->paginate(5);

		return View::make('posts.index', compact('posts'));
	}
	
}