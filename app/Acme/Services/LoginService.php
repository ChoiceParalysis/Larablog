<?php namespace Acme\Services;

use Acme\Validators\LoginValidator;
use Acme\Validators\LoginValidationException;
use Acme\Validators\LoginAuthException;
use Auth;
use Redirect;

class LoginService 
{

	protected $credentials = [];

	public function __construct(LoginValidator $validator)
	{
		$this->validator = $validator;
	}

	public function login($attributes)
	{
		if ($this->validator->isValid($attributes))
		{
			$this->setLoginCredentials($attributes);

			if (Auth::attempt($this->credentials)) {
				return true;
			}

			throw new LoginAuthException('Login authentication failed.', ['auth' => 'Invalid username and/or password.']);
		}

		throw new LoginValidationException('Login validation failed.', $this->validator->getErrors());
	}

	protected function setLoginCredentials($attributes)
	{
		$this->credentials = [
			'username' => $attributes['username'],
			'password' => $attributes['password']
		];
	}

}