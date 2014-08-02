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
Form::macro('delete', function($url, $text = 'Delete', $buttonClass = '')
{
	$options['method'] = 'POST';
	$options['url'] = $url;
	$options['class'] = 'delete-form';

	$button_options['type'] = 'submit';
	$button_options['class'] = 'btn btn-danger ' . $buttonClass;

	return Form::open($options)
		    . "<button" . HTML::attributes($button_options) . "><i class='fa fa-trash-o'></i>&nbsp;{$text}</button>"
		    . Form::close(); 
});

Str::macro('unslug', function($slug)
{
	return str_replace('-', ' ', Str::title($slug));
});