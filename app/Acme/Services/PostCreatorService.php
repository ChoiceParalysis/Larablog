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
			$categoryIds = [1, 2]; // test

			$post = $this->store($attributes);

			$this->syncCategories($post, $categoryIds);
		
			return true;
		}

		throw new PostValidationException('Post validation failed.', $this->validator->getErrors());
	}


	public function store($attributes)
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