<?php

# Basic Pages
Route::get('/', ['as' => 'home', 'uses' => 'PagesController@getHome']);
Route::get('about', ['as' => 'about', 'uses' => 'PagesController@getAbout']);

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
    Route::get('/', 'ForumTopicController@index');

    # Topics
    Route::group(['prefix' => 'topic'], function()
    {
        Route::group(['before' => 'admin'], function()
        {
            Route::get('create', ['as' => 'forum.topic.create', 'uses' => 'ForumTopicController@create']);
            Route::post('create', ['as' => 'forum.topic.store', 'before' => 'csrf', 'uses' => 'ForumTopicController@store']);
            Route::post('{id}/destroy', ['as' => 'forum.topic.destroy', 'before' => 'csrf', 'uses' => 'ForumTopicController@destroy']);
        });
        Route::get('{id}', ['as' => 'forum.topic.show', 'uses' => 'ForumTopicController@show']);
    });

    # Threads
    Route::group(['prefix' => 'thread'], function()
    {
        Route::get('{id}', ['as' => 'forum.thread.show', 'uses' => 'ForumThreadController@show']);

        Route::group(['before' => 'auth'], function()
        {
            Route::get('create/{topic_id}', ['as' => 'forum.thread.create', 'uses' => 'ForumThreadController@create']);
            Route::post('create', ['as' => 'forum.thread.store', 'before' => 'csrf', 'uses' => 'ForumThreadController@store']);
            Route::post('{id}/destroy', ['as' => 'forum.thread.destroy', 'before' => 'csrf', 'uses' => 'ForumThreadController@destroy']);
        });
    });

    # Posts
    Route::group(['prefix' => 'post', 'before' => 'auth|csrf'], function()
    {
        Route::post('create', ['as' => 'forum.post.store', 'uses' => 'ForumPostController@store']);
        Route::post('{id}/destroy', ['as' => 'forum.post.destroy', 'uses' => 'ForumPostController@destroy']);
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

# API
Route::controller('api', 'APIController');

# LAN Party / Attendee
Route::group(array('prefix' => 'lanparty'), function()
{
    # LAN Party Attendee
    Route::get('/', ['as' => 'lanparty.register','before' => 'lanparty', 'uses' => 'LanAttendeeController@create']);
    Route::post('/',['as' => 'lanparty.storeOrDestroy', 'before' => 'lanparty', 'uses' => 'LanPartyController@createOrDestroy']);
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
