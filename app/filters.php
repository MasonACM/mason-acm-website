<?php

# Filter for admin actions
Route::filter('admin', function()
{
	if ( ! Auth::admin()) App::abort(403);
});

# Authentication Filter
Route::filter('auth', function()
{
	if (Auth::guest()) 
	{
		return Redirect::guest('login')
			->withFlashMessage('You must be logged in to view this page');
	}
});

# Guest Filter
Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::home();
});

# LAN Party Filter
Route::filter('lanparty', function()
{
	if( ! MasonACM\Models\LanParty::hasActiveParty()) return Redirect::to('/')
		->withFlashMessage('Sorry, but no LAN Party is currently planned!');
});

# LAN Attendee filter
Route::filter('lanattendee', function()
{
	if ( ! \MasonACM\Models\LanAttendee::checkByUserId(Auth::id())) return Redirect::to('/')
		->withFlashMessage('You must be signed up for the LAN Party to view this page');
});

// CSRF Filter
Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


