<?php

# Filter for admin actions
Route::filter('admin', function()
{
	if (Auth::check()) {		
		// If user is not admin
	    if (Auth::user()->role < 1)
	    {
	        return Redirect::to('/');
	    }
	}
	else
	{
		return Redirect::to('/');
	}
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('users/login')->with('message', 'You must be logged in to view this page');
});

Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

Route::filter('lanparty', function()
{
	if(!LAN_Party::hasActiveParty()) return Redirect::to('/')->with('message', 'Sorry, but no LAN Party is currently planned!');
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


