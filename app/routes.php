<?php

/*
-------------------------------------------------------------------------------
todo:

Bind repository;
categories as links;
edit post;
-------------------------------------------------------------------------------
*/

/*
|-------------------------------------------------------------------------------
| Binding DbPostRepository implementation to PostRepositoryInterface
|-------------------------------------------------------------------------------
*/
App::bind('PostRepositoryInterface', 'DbPostRepository');



Route::get('/', ['as' => 'home', 'uses' => 'PostController@index']);

Route::get('/users/{username}/posts/{id}', 'PostController@show')->where('id', '\d+');

Route::get('/users/{username}/posts/create', ['as' => 'post.create', 'uses' => 'PostController@create']);

Route::post('/users/{username}/posts/create', ['as' => 'posts.store', 'uses' => 'PostController@store']);




Route::get('/login', ['as' => 'login', 'uses' => 'SessionsController@create']);

Route::post('/login', ['as' => 'users.auth', 'uses' => 'SessionsController@store']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::get('/categories/{category}', ['as' => 'categories.index', 'uses' => 'CategoryController@index']);


Route::get('/users/{username}', ['as' => 'users.profile', 'uses' => 'UserController@show']);




Route::get('/users/{username}/posts', 'UserPostController@index');


