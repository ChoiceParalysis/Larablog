<?php

/*
|-------------------------------------------------------------------------------
| Binding DbPostRepository implementation to PostRepositoryInterface
|-------------------------------------------------------------------------------
*/
App::bind('PostRepositoryInterface', 'DbPostRepository');

Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('/users/{username}/posts/{id}', 'PostsController@show')->where('id', '\d+');

Route::get('/users/{username}/posts/create', ['as' => 'post.create', 'uses' => 'PostsController@create']);

Route::post('/users/{username}/posts/create', ['as' => 'posts.store', 'uses' => 'PostsController@store']);




Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);

Route::post('/login', ['as' => 'users.auth', 'uses' => 'SessionsController@store']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);




Route::get('/users/{username}', ['as' => 'users.profile', 'uses' => 'UsersController@show']);




Route::get('/users/{username}/posts', 'UsersPostsController@index');


