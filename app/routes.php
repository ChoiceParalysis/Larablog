<?php


Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('/posts/{id}', 'PostsController@show')->where('id', '\d+');

Route::any('login', ['as' => 'users.login', 'uses' => 'UsersController@login']);

Route::get('/users/{username}', ['as' => 'users.profile', 'uses' => 'UsersController@show']);

Route::get('/users/{username}/posts', 'UsersController@index');

Route::get('/users/{username}/posts/{id}', 'UsersPostsController@show')->where('id', '\d+');

Route::get('/users/{username}/posts/create', 'UsersPostsController@create');

Route::post('/posts/create', ['as' => 'posts.store', 'uses' => 'UsersPostsController@store']);

