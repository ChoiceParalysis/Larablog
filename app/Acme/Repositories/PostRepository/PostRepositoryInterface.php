<?php namespace Acme\Repositories\PostRepository;

interface PostRepositoryInterface
{

	public function all();

	public function find($id, $username = NULL);

	public function paginate($quantity);

}