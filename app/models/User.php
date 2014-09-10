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

}
