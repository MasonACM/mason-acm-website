<?php

# Basic Pages
Route::get('/', [
	'as' => 'home', 
	'uses' => 'PagesController@getHome'
]);

Route::get('about', [
	'as' => 'about', 
	'uses' => 'PagesController@getAbout'
]);

Route::get('vb', [
	'as' => 'vb', 
	'uses' => 'PagesController@getVB'
]);

# Sessions
Route::get('logout', [
	'as' => 'logout', 
	'before' => 'auth', 
	'uses' => 'AuthController@logout'
]);

Route::get('login', [
	'as' => 'login', 
	'before' => 'guest', 
	'uses' => 'AuthController@getLogin'
]);

Route::post('login', [
	'as' => 'login.post', 
	'before' => 'guest|csrf', 
	'uses' => 'AuthController@postLogin'
]);

# User
Route::get('users', [
	'as' => 'users.index',
	'before' => 'admin',
	'uses' => 'UserController@index'
]);

Route::post('register', [
	'as' => 'register',
	'before' => 'csrf', 
	'uses' => 'UserController@store'
]);

Route::get('register', [
	'as' => 'register',
	'before' => 'guest',
	'uses' => 'UserController@create'
]);

Route::get('profile', [
	'as' => 'profile.edit',
	'before' => 'auth',
	'uses' => 'UserController@edit'
]);

Route::put('profile', [
	'as' => 'profile.update',
	'before' => 'auth|csrf',
	'uses' => 'UserController@update'
]);

# Forum
Route::group(['prefix' => 'forum'], function() 
{
	# Index
	Route::get('/', [
		'as' => 'forum.index', 
		'uses' => 'ThreadController@index'
	]);

	# Threads
	Route::get('thread/create', [
		'as' => 'thread.create', 
		'before' => 'auth', 'uses' => 'ThreadController@create'
	]);

	Route::group(['prefix' => 'thread'], function()
	{
		Route::get('{id}', [
			'as' => 'thread.show', 
			'uses' => 'ThreadController@show'
		]);

		Route::group(['before' => 'auth'], function()
		{
			Route::post('create', [
				'as' => 'thread.store', 
				'before' => 'csrf', 
				'uses' => 'ThreadController@store'
			]);

			Route::delete('{id}/destroy', [
				'as' => 'thread.destroy', 
				'before' => 'csrf', 
				'uses' => 'ThreadController@destroy'
			]);
		});
	});

	# Posts
	Route::group(['prefix' => 'post', 'before' => 'auth|csrf'], function()
	{
		Route::post('store', [
			'as' => 'post.store', 
			'uses' => 'PostController@store'
		]);
		Route::delete('{id}/destroy', [
			'as' => 'post.destroy',
			'before' => 'admin',
			'uses' => 'PostController@destroy'
		]);
	});
});

# LAN Party / Attendee
Route::group(['prefix' => 'lanparty'], function()
{
	Route::get('/', [
		'as' => 'lanparty.register',
		'before' => 'auth|lanparty',
		'uses' => 'LanAttendeeController@create'
	]);

	Route::get('manage', [
		'as' => 'lanparty.index',
		'before' => 'admin',
		'uses' => 'LanPartyController@index'
	]);

	Route::post('/', [
		'as' => 'lanparty.store',
		'before' => 'admin|csrf',
		'uses' => 'LanPartyController@store'
	]);

	Route::get('{id}/activate', [
		'as' => 'lanparty.activate',
		'before' => 'admin',
		'uses' => 'LanPartyController@activate'
	]);

	Route::get('{id}/deactivate', [
		'as' => 'lanparty.deactivate',
		'before' => 'admin',
		'uses' => 'LanPartyController@deactivate'
	]);

	Route::post('{id}/update', [
		'as' => 'lanparty.update',
		'before' => 'admin|csrf',
		'uses' => 'LanPartyController@update'
	]);

	Route::delete('{id}/delete', [
		'as' => 'lanparty.destroy',
		'before' => 'admin|csrf',
		'uses' => 'LanPartyController@delete'
	]);

	Route::get('{id}/roster', [
		'as' => 'lanparty.roster',
		'before' => 'admin',
		'uses' => 'LanPartyController@show'
	]);

	Route::post('{id}/roster/add', [
		'as' => 'lanparty.roster.add',
		'before' => 'csrf',
		'uses' => 'LanAttendeeController@storeFromUser'
	]);

	Route::post('{id}/admin/roster/add', [
		'as' => 'lanparty.admin.roster.add',
		'before' => 'admin',
		'uses' => 'LanAttendeeController@store'
	]);

	Route::get('roster/attendee/{id}/toggle', [
		'as' => 'attendee.toggle',
		'before' => 'admin',
		'uses' => 'LanAttendeeController@toggleAttendance'
	]);

	# Competition routes
	Route::group(['prefix' => 'competitions', 'before' => 'lanattendee'], function()
	{
		Route::get('/', [
			'as' => 'competitions.index',
			'uses' => 'CompetitionController@index'
		]);

		Route::get('{id}/edit', [
			'as' => 'competitions.edit',
			'before' => 'admin',
			'uses' => 'CompetitionController@edit'
		]);

		Route::post('{id}/update', [
			'as' => 'competitions.update',
			'before' => 'admin|csrf',
			'uses' => 'CompetitionController@update'
		]);

		Route::post('/', [
			'as' => 'competitions.store',
			'before' => 'admin|csrf',
			'uses' => 'CompetitionController@store'
		]);

		Route::delete('{id}/delete', [
			'as' => 'competitions.destroy',
			'before' => 'admin|csrf',
			'uses' => 'CompetitionController@destroy'
		]);

		Route::get('{id}', [
			'as' => 'competitions.show',
			'uses' => 'CompetitionController@show'
		]);
	});

	# Team
	Route::group(['prefix' => 'teams', 'before' => 'lanattendee'], function()
	{
		Route::post('{competitionId}', [
			'as' => 'teams.store',
			'before' => 'csrf|auth',
			'uses' => 'TeamController@store'
		]);

		Route::delete('{id}', [
			'as' => 'teams.destroy',
			'before' => 'csrf|auth',
			'uses' => 'TeamController@destroy'
		]);

		Route::get('{teamId}/kick/{competitionId}', [
			'as' => 'teams.kick',
			'before' => 'auth',
			'uses' => 'TeamController@kickCompetitor'
		]);
	});

	# Competitor
	Route::group(['prefix' => 'competitors', 'before' => 'lanattendee'], function()
	{
		Route::post('{competitionId}', [
			'as' => 'competitors.store',
			'before' => 'csrf|auth',
			'uses' => 'CompetitorController@store'
		]);

		Route::delete('{teamId}', [
			'as' => 'competitors.destroy',
			'before' => 'csrf|auth',
			'uses' => 'CompetitorController@destroy'
		]);
	});

});

# Interest Group
Route::get('special-interest-groups', [
	'as' => 'sig.index',
	'uses' => 'InterestGroupController@index'
]);

Route::get('special-interest-groups/{url}', [
	'as' => 'sig.show',
	'uses' => 'InterestGroupController@show'
]);

# Admin
Route::group(['prefix' => 'admin', 'before' => 'admin'], function() 
{
	Route::get('/', [
		'as' => 'admin.index',
		'before' => 'admin',
		'uses' => 'AdminController@getIndex'
	]);

	Route::get('members', [
		'as' => 'admin.members',
		'before' => 'admin',
		'uses' => 'AdminController@getMembers'
	]);

});

Route::group(['prefix' => 'password'], function()
{
	Route::get('remind', [
		'as' => 'password.remind',
		'before' => 'guest',
		'uses' => 'PasswordController@getRemind'
	]);

	Route::post('remind', [
		'as' => 'password.remind',
		'before' => 'guest',
		'uses' => 'PasswordController@postRemind'
	]);

	Route::get('reset/{token}', [
		'as' => 'password.reset',
		'before' => 'guest',
		'uses' => 'PasswordController@getReset'
	]);

	Route::post('reset', [
		'as' => 'password.reset',
		'before' => 'guest',
		'uses' => 'PasswordController@postReset'
	]);

	Route::post('change', [
		'as' => 'password.change',
		'before' => 'auth',
		'uses' => 'PasswordController@postChange'
	]);
});