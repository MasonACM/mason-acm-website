<?php

/**
 * Generate a delete form
 */
Form::macro('delete', function($attributes = [])
{
	return Form::open($attributes) .
			    "<button" . HTML::attributes(['class' => 'btn btn-danger']) . ">" .
			    	"<i class='fa fa-trash-o'></i>&nbsp;Delete" .
			    "</button>" .
		   Form::close(); 
});

/**
 * Convert a slugged string into a titled string 
 */
Str::macro('unslug', function($slug)
{
	return str_replace('-', ' ', Str::title($slug));
});
