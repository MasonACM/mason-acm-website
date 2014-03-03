<?php

# Homepage
Route::get('/', function() { return View::make('index'); });

# File Downloader
Route::get('files/download/{file_name}', 'FileController@getDownload');

# Admin Filtered Routes
Route::group(array('before' => 'admin'), function() 
{
	# Admin Controller
   	Route::controller('admin' , 'AdminController');
	Route::resource('content' , 'StaticContentController');
	# Special Intrest Groups
	Route::get('sig/new',  'SIGController@getNew');
	Route::get('sig/edit', 'SIGController@getEdit');
	Route::post('sig/delete', 'SIGController@postDelete');
	# Forum
	Route::get('forum/newtopic', 'ForumController@getNewtopic');
	# Files
	Route::get('files/upload',  'FileController@getUpload');
	Route::post('files/upload', 'FileController@postUpload');
	# LAN Party
	// Route::get('lanparty/roster', 'LanPartyController@getRoster');
	// Route::get('lanparty/signup', 'LanPartyController@getSignup');
	// Route::get('lanparty/games',  'LanPartyController@getGames');
	// Route::resource('langames',   'LanGameController');
});

# Auth Filtered Routes
Route::group(['before' => 'auth'], function()
{
	# Forum
	Route::get('forum/thread/{id}',    'ForumController@getThread');
	Route::get('forum/newthread/{id}', 'ForumController@getNewthread');
});

# Special Interest Groups
Route::get('sig/{url}','SIGController@display');

Route::controller('sig',      'SIGController');
Route::controller('users',    'UsersController');
//Route::controller('lanparty', 'LanPartyController');
//Route::controller('lanteam',  'LanTeamController');
Route::controller('forum',    'ForumController');
Route::controller('api',      'APIController');

# Tutorials
Route::get('tutorials/create', 'TutorialController@getCreate');
Route::post('tutorials/create', 'TutorialController@postCreate');
Route::get('tutorials/view/{id}', 'TutorialController@getTutorial');
Route::get('tutorials/{name}', 'TutorialController@getTopic');
Route::get('tutorials/edit/{id}', 'TutorialController@getEdit');
Route::post('tutorials/edit/{id}', 'TutorialController@postEdit');
Route::post('tutorials/delete/{id}', 'TutorialController@postDelete');
Route::get('tutorials', 'TutorialController@getIndex');

if (Auth::check()) {
	if (Auth::user()->role >= 2) {
		Route::controller('superadmin', 'SuperAdminController');
	}
}

# Static page route, must be last route
Route::get('/{url}', 'StaticContentController@display');

