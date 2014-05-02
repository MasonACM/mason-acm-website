<?php

# Basic Pages
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);

# Sessions
Route::get('logout', ['as' => 'logout', 'uses' => 'SessionController@destroy']);
Route::get('login', ['as' => 'login.get', 'uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login.post', 'uses' => 'SessionController@store']);

# Registration
Route::post('register', ['as' => 'register.store', 'uses' => 'RegistrationController@store']);
Route::get('register', ['as' => 'register.create', 'uses' => 'RegistrationController@create']);

# Files
Route::get('files/download/{file_name}', 'FileController@getDownload');
Route::get('files/upload',  array('before' => 'admin', 'uses' => 'FileController@getUpload'));
Route::post('files/upload', array('before' => 'admin', 'uses' => 'FileController@postUpload'));

# Forum
Route::group(['prefix' => 'forum'], function() 
{
	Route::get('/', 'ForumController@getIndex');
	Route::get('new/topic', 'ForumController@getCreateTopic');
	Route::post('new/topic', 'ForumController@postCreateTopic');
	Route::get('topic/{id}', 'ForumController@getTopic');
	Route::get('thread/{id}', 'ForumController@getThread');
	Route::post('post/create', 'ForumController@postCreatePost');
	Route::get('new/thread/{id}', 'ForumController@getCreateThread');
	Route::post('new/thread/{id}', 'ForumController@postCreateThread');
	Route::post('post/{id}/delete', 'ForumController@postDeletePost');
	Route::post('thread/{id}/delete', 'ForumController@postDeleteThread');
});

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

# LAN Party
Route::group(array('prefix' => 'lanparty', 'before' => 'lanparty'), function() 
{
	Route::get('/', 'LanPartyController@getSignUp');
	Route::post('/', 'LanPartyController@postSignUp');
	Route::get('roster', array('before' => 'admin', 'uses' => 'LanPartyController@getRoster'));
	Route::post('roster/add', array('before' => 'admin', 'uses' => 'LanPartyController@postAddtoRoster'));
	Route::get('manage', 'LanPartyController@getManage');
});

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
