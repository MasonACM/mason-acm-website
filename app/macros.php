<?php

/**
 * Generate an icon.
 */
HTML::macro('Icon', function($icon, $iconType = 'fa')
{
	return "<i class='" . $iconType . " " . " " . $iconType . "-" . $icon . "'></i> &nbsp";
});

/**
 * Generate a link with an icon
 */
HTML::macro('linkWithIcon', function($url = '/', $text = 'link', $icon = 'external-link', $options = [], $iconType = 'fa')
{
	return "<a href='" . URL::to($url) . "'" . HTML::attributes($options) . ">" . HTML::Icon($icon, $iconType) . $text . "</a>";
});

/**
 * Generate a delete form
 */
Form::macro('delete', function($attributes = [])
{

	return Form::open($attributes)
		    . "<button" . HTML::attributes(['class' => 'btn btn-danger']) . "><i class='fa fa-trash-o'></i>&nbsp;Delete</button>"
		    . Form::close(); 
});

Str::macro('unslug', function($slug)
{
	return str_replace('-', ' ', Str::title($slug));
});