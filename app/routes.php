<?php

# Basic Pages
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('vb', ['as' => 'vb', 'uses' => 'PagesController@getVB']);

# Sessions
Route::get('logout', ['as' => 'logout', 'before' => 'auth', 'uses' => 'SessionController@destroy']);
Route::get('login', ['as' => 'login', 'before' => 'guest', 'uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login.post', 'before' => 'guest|csrf', 'uses' => 'SessionController@store']);

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
    Route::get('/', ['as' => 'forum.index', 'uses' => 'ThreadController@index']);

    # Threads
    Route::get('thread/create', ['as' => 'thread.create', 'before' => 'auth', 'uses' => 'ThreadController@create']);
    Route::group(['prefix' => 'thread'], function()
    {
        Route::get('{id}', ['as' => 'thread.show', 'uses' => 'ThreadController@show']);

        Route::group(['before' => 'auth'], function()
        {
            Route::post('create', ['as' => 'thread.store', 'before' => 'csrf', 'uses' => 'ThreadController@store']);
            Route::delete('{id}/destroy', ['as' => 'thread.destroy', 'before' => 'csrf', 'uses' => 'ThreadController@destroy']);
        });
    });

    # Posts
    Route::group(['prefix' => 'post', 'before' => 'auth|csrf'], function()
    {
        Route::post('store', ['as' => 'post.store', 'uses' => 'PostController@store']);
        Route::delete('{id}/destroy', ['as' => 'post.destroy','before' => 'admin', 'uses' => 'PostController@destroy']);
    });
});

# LAN Party / Attendee
Route::group(['prefix' => 'lanparty'], function()
{
	Route::get('/', [
		'as' => 'lanparty.register',
		'before' => 'auth',
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
		'before' => 'admin',
		'uses' => 'LanAttendeeController@storeFromUser'
	]);

	Route::post('{id}/admin/roster/add', [
		'as' => 'lanparty.admin.roster.add',
		'before' => 'admin',
		'uses' => 'LanAttendeeController@store'
	]);
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
    Route::get('/', ['as' => 'admin.index', 'before' => 'admin', 'uses' => 'AdminController@getIndex']);
});
