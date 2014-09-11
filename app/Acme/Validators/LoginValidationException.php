<?php namespace Acme\Validators;

use Exception;

class LoginValidationException extends Exception
{

	protected $errors;
	
	public function __construct($message, $errors, $code = 0, Exception $previous = NULL)
	{
		$this->errors = $errors;
		parent::__construct($message, $code, $previous);
	}


	public function getErrors()
	{
		return $this->errors;
	}
}