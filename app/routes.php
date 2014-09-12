<?php


Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('/posts/{id}', 'PostsController@show')->where('id', '\d+');

Route::get('/login', ['as' => 'session.login', 'uses' => 'SessionsController@create']);

Route::post('/login', ['as' => 'users.auth', 'uses' => 'SessionsController@store']);

Route::get('/users/{username}', ['as' => 'users.profile', 'uses' => 'UsersController@show']);

Route::get('/users/{username}/posts', 'UsersPostsController@index');

Route::get('/users/{username}/posts/{id}', 'UsersPostsController@show')->where('id', '\d+');

Route::get('/users/{username}/posts/create', 'UsersPostsController@create');

Route::post('/posts/create', ['as' => 'posts.store', 'uses' => 'UsersPostsController@store']);

