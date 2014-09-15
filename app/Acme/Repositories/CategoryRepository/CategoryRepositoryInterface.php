<?php namespace Acme\Repositories\CategoryRepository;

interface CategoryRepositoryInterface
{

	public function all();

	public function byName($name);

	public function getFromPost($post);
}