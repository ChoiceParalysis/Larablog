<?php 

use Acme\Repositories\PostRepository\DbPostRepository;
use Acme\Services\PostCreatorService;

class PostsController extends \BaseController {

	protected $postRepository;
	protected $postCreator;

	public function __construct(DbPostRepository $postRepository, PostCreatorService $postCreator)
	{
		$this->postRepository = $postRepository;
		$this->postCreator = $postCreator;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->postRepository->paginate(5);

		return View::make('posts.index', compact('posts'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($username)
	{
		if (credentialsMatch($username)){
			return View::make('partials/_form');
		}

		return Redirect::route('login');
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
	public function show($id)
	{
		$post = $this->postRepository->find($id);

		
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
