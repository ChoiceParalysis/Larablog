<?php

use Acme\Repositories\UserRepository\DbUserRepository;
use Acme\Validators\LoginValidationException;
use Acme\Services\LoginService;

class UsersController extends \BaseController {

	protected $userRepository;
	protected $loginService;

	public function __construct(DbUserRepository $userRepository, LoginService $loginService)
	{
		$this->loginService = $loginService;
		$this->userRepository = $userRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @param  string $username
	 * @return Response
	 */
	public function index()
	{
		
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

		return View::make('users.profile', compact('user'));
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

	public function login()
	{
		if (isRequestType(Input::server('REQUEST_METHOD'), 'POST')){

			try {

				$this->loginService->login(Input::all());

				return Redirect::to('/users/' . Auth::user()->username);
			}

			catch(LoginValidationException $e){

				return Redirect::back()->withInput()->withErrors($e->getErrors());
			}

		} else {
			return View::make('users.login');
		}
	}


}
