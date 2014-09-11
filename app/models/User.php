<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function getAuthPassword()
	{
		return $this->password;
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function setRememberToken($value)
	{
		$this->rememberToken = $value;
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function getRememberTokenName()
	{
		return "remember_token";
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public function getReminderEmail()
	{
		return $this->email;
	}

	/*
	-------------------------------------------------------------------------------
	comment
	-------------------------------------------------------------------------------
	*/
	public static function byUsername($username)
	{

		$user = User::whereUsername($username)->first();

		if (! $user)
			throw new Illuminate\Database\Eloquent\ModelNotFoundException;

		return $user;
	}

	public function posts()
	{
		return $this->hasMany('Post');
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

}
