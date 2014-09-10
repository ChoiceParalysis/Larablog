<?php namespace Acme\Repositories\UserRepository;

interface UserRepositoryInterface
{

	public function all();

	public function getByUsername($username);

}