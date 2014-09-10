<?php

use Acme\Repositories\UserRepository\DbUserRepository;

class UsersController extends \BaseController {

	protected $userRepository;

	public function __construct(DbUserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  string $username
	 * @return Response
	 */
	public function index($username)
	{
		$user = $this->userRepository->getByUsername($username);

		$posts = $user->posts;

		return $posts;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  string $username
	 * @return Response
	 */
	public function show($username)
	{
		$user = $this->userRepository->getByUsername($username);

		return $user;
	}	


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
