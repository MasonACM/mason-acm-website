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

# Files
Route::get('files/download/{file_name}', 'FileController@getDownload');
Route::get('files/upload',  array('before' => 'admin', 'uses' => 'FileController@getUpload'));
Route::post('files/upload', array('before' => 'admin', 'uses' => 'FileController@postUpload'));

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

# LAN Party
Route::group(array('prefix' => 'lanparty', 'before' => 'lanparty'), function() 
{
	Route::get('/', 'LanPartyController@getSignUp');
	Route::post('/', 'LanPartyController@postSignUp');
	Route::get('roster', array('before' => 'admin', 'uses' => 'LanPartyController@getRoster'));
	Route::post('roster/add', array('before' => 'admin', 'uses' => 'LanPartyController@postAddtoRoster'));
	Route::get('manage', 'LanPartyController@getManage');
    Route::post('create', ['as' => 'lanparty.store', 'before' => 'admin|csrf', 'uses' => 'LanPartyController@store']);
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
