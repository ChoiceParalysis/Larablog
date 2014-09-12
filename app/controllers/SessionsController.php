<?php

use Acme\Validators\LoginValidationException;
use Acme\Validators\LoginAuthException;
use Acme\Services\LoginService;

class SessionsController extends \BaseController {

	protected $loginService;

	public function __construct(LoginService $loginService)
	{
		$this->loginService = $loginService;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.login');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		try {

			$this->loginService->login(Input::all());

			return Redirect::to('/users/' . Auth::user()->username);
		}
		catch(Exception $e)
		{
			if ($e instanceof LoginValidationException || $e instanceof LoginAuthException)
			{
				return Redirect::back()->withInput()->withErrors($e->getErrors());
			}
		}
	
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
