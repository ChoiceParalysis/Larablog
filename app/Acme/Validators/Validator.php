<?php namespace Acme\Validators;

use Validator as LaravelValidator;

abstract class Validator
{

	protected $errors;

	public function isValid($attributes)
	{
		$v = LaravelValidator::make($attributes, static::$rules);

		if ($v->fails())
		{
			$this->errors = $v->messages();
			return false;
		}

		return true;
	}

	public function getErrors()
	{
		return $this->errors;
	}

}