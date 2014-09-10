<?php


Route::get('/', ['as' => 'home', 'uses' => 'PostsController@index']);

Route::get('/posts/{id}', 'PostsController@show')->where('id', '\d+');

Route::get('/users/{username}/posts', 'UsersController@index');

Route::get('/users/{username}', 'UsersController@show');

Route::get('/users/{username}/posts/{id}', 'UsersPostsController@show')->where('id', '\d+');
