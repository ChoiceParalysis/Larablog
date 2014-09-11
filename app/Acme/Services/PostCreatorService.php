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
			Post::create([
				'title' => $attributes['title'],
				'body' => $attributes['body'],
				'category_id' => 1,
				'user_id' => Auth::user()->id
			]);
		
			return true;
		}

		throw new PostValidationException('Post validation failed.', $this->validator->getErrors());
	}

}