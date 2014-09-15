<?php 

use Acme\Repositories\PostRepository\PostRepositoryInterface;
use Acme\Repositories\CategoryRepository\CategoryRepositoryInterface;
use Acme\Services\PostCreatorService;

use Acme\Validators\PostValidationException;

class PostController extends \BaseController {

	protected $postRepository;
	protected $postCreator;
	protected $categoryRepository;

	protected $categories = [];


	public function __construct(PostRepositoryInterface $postRepository, PostCreatorService $postCreator,
							    CategoryRepositoryInterface $categoryRepository)
	{		
		$this->postRepository = $postRepository;
		$this->postCreator = $postCreator;
		$this->categoryRepository = $categoryRepository;

		$this->categories = $this->categoryRepository->all();
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

			return View::make('posts.create', ['categories' => $this->categories]);
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
		try 
		{
			$this->postCreator->create(Input::all());
		} 
		catch(PostValidationException $e)
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
		$post = $this->postRepository->find($id, $username);
		
		return View::make('posts.show', compact('post'));
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($username, $id)
	{
		if (credentialsMatch($username))
		{
			$post = $this->postRepository->find($id, $username);

			$postCategories = $this->categoryRepository->getFromPost($post);

			return View::make('posts.edit', ['post' => $post, 'categories' => $this->categories, 'postCategories' => $postCategories]);
		}

		return Redirect::home();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($username, $id)
	{

		if (credentialsMatch($username))
		{
			$post = $this->postRepository->find($id, $username);

			try
			{
				$this->postCreator->update($post, Input::all());
			}
			catch(PostValidationException $e)
			{
				return Redirect::back()->withInput()->withErrors($e->getErrors());	
			}
		}

		return Redirect::home();
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
