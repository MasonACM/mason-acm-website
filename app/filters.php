<?php

# Filter for admin actions
Route::filter('admin', function()
{
	if (Auth::check()) 
	{		
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

# Authentication Filter
Route::filter('auth', function()
{
	if (Auth::guest()) 
	{
		return Redirect::to('users/login')
			->withFlashMessage('You must be logged in to view this page');
	}
});

# Guest Filter
Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::home()->withFlashMessage('you already have an account lol');
});

# LAN Party Filter
Route::filter('lanparty', function()
{
	if(!LAN_Party::hasActiveParty()) return Redirect::to('/')->with('message', 'Sorry, but no LAN Party is currently planned!');
});

// CSRF Filter
Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


