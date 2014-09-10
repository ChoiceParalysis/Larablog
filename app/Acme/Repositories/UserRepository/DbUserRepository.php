<?php namespace Acme\Repositories\UserRepository;

use User;

class DbUserRepository implements UserRepositoryInterface
{
	
	public function all()
	{
		$users = \User::all();

		return $users;
	}

	public function getByUsername($username)
	{

		$user = User::byUsername($username);

		return $user;

	}

}