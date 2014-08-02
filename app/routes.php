<?php

# Api
Route::group(['prefix' => 'api'], function() 
{
    # User
    Route::group(['prefix' => 'user'], function()
    {
        Route::post('login', 'UserApiController@login');
    });
});

# Basic Pages
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);
Route::get('vb', ['as' => 'vb', 'uses' => 'PagesController@getVB']);

# Sessions
Route::get('logout', ['as' => 'logout', 'before' => 'auth', 'uses' => 'SessionController@destroy']);
Route::get('login', ['as' => 'login', 'before' => 'guest', 'uses' => 'SessionController@create']);
Route::post('login', ['as' => 'login.post', 'before' => 'guest|csrf', 'uses' => 'SessionController@store']);

# Registration
Route::group(['prefix' => 'register', 'before' => 'guest'], function()
{
    Route::post('/', ['as' => 'register.store', 'before' => 'csrf', 'uses' => 'RegistrationController@store']);
    Route::get('/', ['as' => 'register.create', 'uses' => 'RegistrationController@create']);
});

# Profile
Route::group(['prefix' => 'profile', 'before' => 'auth'], function() 
{
    Route::get('edit', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::post('update', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
});

# Forum
Route::group(['prefix' => 'forum'], function() 
{
    # Index
    Route::get('/', 'ThreadController@index');

    # Threads
    Route::group(['prefix' => 'thread'], function()
    {
        Route::get('{id}', ['as' => 'thread.show', 'uses' => 'ThreadController@show']);

        Route::group(['before' => 'auth'], function()
        {
            Route::get('create/{topic_id}', ['as' => 'thread.create', 'uses' => 'ThreadController@create']);
            Route::post('create', ['as' => 'thread.store', 'before' => 'csrf', 'uses' => 'ThreadController@store']);
            Route::post('{id}/destroy', ['as' => 'thread.destroy', 'before' => 'csrf', 'uses' => 'ThreadController@destroy']);
        });
    });

    # Posts
    Route::group(['prefix' => 'post', 'before' => 'auth|csrf'], function()
    {
        Route::post('store', ['as' => 'post.store', 'uses' => 'PostController@store']);
        Route::post('{id}/destroy', ['as' => 'forum.post.destroy', 'uses' => 'PostController@destroy']);
    });
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

# LAN Party / Attendee
Route::group(array('prefix' => 'lanparty'), function()
{
    # LAN Party Attendee
    Route::get('/', ['as' => 'lanparty.register','before' => 'lanparty', 'uses' => 'LanAttendeeController@create']);
    Route::post('/',['as' => 'lanparty.storeOrDestroy', 'before' => 'lanparty', 'uses' => 'LanAttendeeController@storeOrDestroy']);
    Route::post('{id}/roster/add', ['as' => 'lanparty.roster.add', 'before' => 'admin', 'uses' => 'LanAttendeeController@store']);

    # LAN Party
    Route::get('{id}/roster', ['before' => 'admin|auth', 'uses' => 'LanPartyController@show']);
    Route::get('manage', ['as' => 'lanparty.manage', 'before' => 'admin|auth', 'uses' => 'LanPartyController@index']);
    Route::post('create', ['as' => 'lanparty.store', 'before' => 'admin|csrf', 'uses' => 'LanPartyController@store']);
    Route::post('{id}/update', ['as' => 'lanparty.update', 'before' => 'admin|csrf|auth', 'uses' => 'LanPartyController@update']);
    Route::get('{id}/activate', ['as' => 'lanparty.activate', 'before' => 'admin|auth', 'uses' => 'LanPartyController@activate']);
    Route::get('{id}/deactivate', ['as' => 'lanparty.deactivate', 'before' => 'admin|auth', 'uses' => 'LanPartyController@deactivate']);
    Route::post('{id}/destroy', ['as' => 'lanparty.destroy', 'before' => 'admin|auth|csrf', 'uses' => 'LanPartyController@destroy']);
    Route::get('test', 'LanPartyController@test');
});

# Interest Group
Route::get('special-interest-group/{url}', [
    'as' => 'sig.show',
    'uses' => 'InterestGroupController@show'
]);

# Admin
Route::group(array('before' => 'admin'), function() 
{
	Route::controller('admin', 'AdminController');
});
