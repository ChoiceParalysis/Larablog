<?php

function isRequestType($request, $expectedResult)
{
	return ($request == $expectedResult);
}

function credentialsMatch($username)
{

	$user = User::byUsername($username);

	if (Auth::guest() || Auth::user()->id !== $user->id) {
		return false;
	}

	return true;
}