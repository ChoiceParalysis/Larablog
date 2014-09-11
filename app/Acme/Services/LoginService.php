<?php namespace Acme\Services;

use Acme\Validators\LoginValidator;
use Acme\Validators\LoginValidationException;

class LoginService 
{

	public function __construct(LoginValidator $validator)
	{
		$this->validator = $validator;
	}

	public function login($attributes)
	{
		if ($this->validator->isValid($attributes))
		{
			return true;
		}

		throw new LoginValidationException('Login validation failed.', $this->validator->getErrors());
	}

}