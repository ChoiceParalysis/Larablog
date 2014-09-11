<?php namespace Acme\Validators;

class PostValidator extends Validator
{

	protected static $rules = [
		'title' => 'required',
		'body' => 'required'
	];

}