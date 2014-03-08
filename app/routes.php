<?php

# Homepage
Route::get('/', function() { return View::make('index'); });

# Files
Route::get('files/download/{file_name}', 'FileController@getDownload');
Route::get('files/upload',  array('before' => 'admin', 'uses' => 'FileController@getUpload'));
Route::post('files/upload', array('before' => 'admin', 'uses' => 'FileController@postUpload'));

# Forum
Route::get('forum/newtopic', array('before' => 'admin', 'uses' => 'ForumController@getNewtopic'));
Route::get('forum/newthread/{id}', array('before' => 'auth' 'uses' => 'ForumController@getNewthread'));
Route::get('forum/thread/{id}', 'ForumController@getThread');

# API
Route::controller('api', 'APIController');

# Special Intrest Groups
Route::get('sig/new',  'SIGController@getNew');
Route::get('sig/edit', 'SIGController@getEdit');
Route::post('sig/delete', 'SIGController@postDelete');

# Auth Filtered Routes
Route::group(['before' => 'auth'], function()
{
	# Forum

});

# Special Interest Groups
Route::get('sig/{url}','SIGController@display');

Route::controller('sig',      'SIGController');
Route::controller('users',    'UsersController');
//Route::controller('lanparty', 'LanPartyController');
//Route::controller('lanteam',  'LanTeamController');
Route::controller('forum',    'ForumController');


# Tutorials
Route::get('tutorials/create', 'TutorialController@getCreate');
Route::post('tutorials/create', 'TutorialController@postCreate');
Route::get('tutorials/view/{id}', 'TutorialController@getTutorial');
Route::get('tutorials/{name}', 'TutorialController@getTopic');
Route::get('tutorials/edit/{id}', 'TutorialController@getEdit');
Route::post('tutorials/edit/{id}', 'TutorialController@postEdit');
Route::post('tutorials/delete/{id}', 'TutorialController@postDelete');
Route::get('tutorials', 'TutorialController@getIndex');
