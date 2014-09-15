<?php

/*
|-------------------------------------------------------------------------------
| Binding DbPostRepository implementation to PostRepositoryInterface
|-------------------------------------------------------------------------------
*/
App::bind('Acme\Repositories\PostRepository\PostRepositoryInterface', 'Acme\Repositories\PostRepository\DbPostRepository');


Route::get('/', ['as' => 'home', 'uses' => 'PostController@index']);

Route::get('/users/{username}/posts/{id}', 'PostController@show')->where('id', '\d+');

Route::get('/users/{username}/posts/{id}/edit', ['as'=> 'posts.edit', 'uses' => 'PostController@edit'])
																				   ->where('id', '\d+');

Route::patch('/users/{username}/posts/{id}/edit', ['as' => 'posts.update', 'uses' => 'PostController@update'])
																					->where('id', '\d+');

Route::get('/users/{username}/posts/create', ['as' => 'posts.create', 'uses' => 'PostController@create']);

Route::post('/users/{username}/posts/create', ['as' => 'posts.store', 'uses' => 'PostController@store']);




Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);

Route::post('/login', ['as' => 'users.auth', 'uses' => 'SessionsController@store']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::get('/categories/{category}', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);


Route::get('/users/{username}', ['as' => 'users.profile', 'uses' => 'UserController@show']);




Route::get('/users/{username}/posts', 'UserPostController@index');


