<?php namespace Acme\Services;

use Acme\Validators\PostValidator;
use Acme\Validators\PostValidationException; 
use Post;
use Auth;

class PostCreatorService
{

	protected $validator;

	public function __construct(PostValidator $validator)
	{
		$this->validator = $validator;
	}

	public function create(array $attributes)
	{	
		if ($this->validator->isValid($attributes)) 
		{
			$categories = $attributes['category_id'];

			$post = $this->store($attributes);

			$this->syncCategories($post, $categories);
		
			return true;
		}

		throw new PostValidationException('Post validation failed.', $this->validator->getErrors());
	}


	public function update($post, array $attributes)
	{
		if ($this->validator->isValid($attributes))
		{
			$categories = $attributes['category_id'];

			$post = $post->fill([
				'title' => $attributes['title'],
				'body'  => $attributes['body']
			]);

			$post->save();

			$this->syncCategories($post, $categories);
		
			return true;
		}

		throw new PostValidationException('Post validation failed.', $this->validator->getErrors());
	}


	public function store(array $attributes)
	{
		return Post::create([
			'title' => $attributes['title'],
			'body' => $attributes['body'],
			'user_id' => Auth::user()->id
		]);
	}


	public function syncCategories($post, $categoryIds)
	{
		$post->categories()->sync($categoryIds);
	}

}