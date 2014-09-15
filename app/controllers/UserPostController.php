<?php

use Acme\Services\PostCreatorService;
use Acme\Repositories\PostRepository\DbPostRepository;

class UserPostController extends \BaseController {

	protected $postCreator;
	protected $postRepository;

	public function __construct(PostCreatorService $postCreator, DbPostRepository $postRepository)
	{
		$this->postCreator = $postCreator;
		$this->postRepository = $postRepository;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($username)
	{
		$posts = $this->postRepository->getByUsername($username);

		return View::make('posts.index', compact('posts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		
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
	public function show()
	{
		
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
