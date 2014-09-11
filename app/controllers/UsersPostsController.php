<?php

use Acme\Services\PostCreatorService;

class UsersPostsController extends \BaseController {

	protected $postCreator;

	public function __construct(PostCreatorService $postCreator)
	{
		$this->postCreator = $postCreator;
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
		return View::make('partials/_form');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		try {
			$this->postCreator->create(Input::all());
		} 
		catch(Acme\Validators\PostValidationException $e)
		{
			return Redirect::back()->withInput()->withErrors($e->getErrors());	
		}

		

		

		return Redirect::home();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($username, $id)
	{
		$post = Post::find($id, $username);

		return View::make('posts.show', compact('post'));
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
