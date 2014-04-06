<?php

# Basic Pages
Route::get('/', 'PagesController@getHome');
Route::get('about', 'PagesController@getAbout');

# Users Controller
Route::get('users/login', 'UsersController@getLogin');
Route::get('users/register', 'UsersController@getRegister');
Route::get('users/logout', 'UsersController@getLogout');
Route::post('users/create', 'UsersController@postCreate');
Route::post('users/login', 'UsersController@postLogin');

# Files
Route::get('files/download/{file_name}', 'FileController@getDownload');
Route::get('files/upload',  array('before' => 'admin', 'uses' => 'FileController@getUpload'));
Route::post('files/upload', array('before' => 'admin', 'uses' => 'FileController@postUpload'));

# Forum
Route::get('forum/new/topic', array('before' => 'admin', 'uses' => 'ForumController@getCreateTopic'));
Route::post('forum/new/topic', array('before' => 'admin', 'uses' => 'ForumController@postCreateTopic'));
Route::get('forum/new/thread/{id}', array('before' => 'auth', 'uses' => 'ForumController@getCreateThread'));
Route::post('forum/new/thread/{id}', array('before' => 'auth', 'uses' => 'ForumController@postCreateThread'));
Route::post('forum/post/create', array('before' => 'auth', 'uses' => 'ForumController@postCreatePost'));
Route::post('forum/post/{id}/delete', array('before' => 'auth', 'uses' => 'ForumController@postDeletePost'));
Route::post('forum/thread/{id}/delete', array('before' => 'auth', 'uses' => 'ForumController@postDeleteThread'));
Route::get('forum/thread/{id}', 'ForumController@getThread');
Route::get('forum/topic/{id}', 'ForumController@getTopic');
Route::get('forum', 'ForumController@getIndex');

# Tutorials
Route::get('tutorials/create', array('before' => 'auth', 'uses' =>  'TutorialController@getCreate'));
Route::post('tutorials/create', array('before' => 'auth', 'uses' => 'TutorialController@postCreate'));
Route::get('tutorials/edit/{id}', array('before' => 'auth', 'uses' => 'TutorialController@getEdit'));
Route::post('tutorials/edit/{id}', array('before' => 'auth', 'uses' => 'TutorialController@postEdit'));
Route::post('tutorials/delete/{id}', array('before' => 'auth', 'uses' => 'TutorialController@postDelete'));
Route::get('tutorials/view/{id}', 'TutorialController@getTutorial');
Route::get('tutorials/{name}', 'TutorialController@getTopic');
Route::get('tutorials', 'TutorialController@getIndex');

# API
Route::controller('api', 'APIController');

# Special Intrest Groups
Route::get('sig/create', array('before' => 'admin', 'uses' => 'SIGController@getCreate'));
Route::post('sig/create', array('before' => 'admin', 'uses' => 'SIGController@postCreate'));
Route::get('sig/{id}/edit', array('before' => 'admin', 'uses' => 'SIGController@getEdit'));
Route::post('sig/{id}/edit', array('before' => 'admin', 'uses' => 'SIGController@postEdit'));
Route::post('sig/{id}/delete', array('before' => 'admin', 'uses' => 'SIGController@postDelete'));
Route::get('sig/{url}', 'SIGController@getView');
Route::get('sig', 'SIGController@getIndex');

# Admin
Route::group(array('before' => 'admin'), function() 
{
	Route::controller('admin', 'AdminController');
});