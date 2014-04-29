<?php

/**
 * Generates a link with an icon
 */
HTML::macro('linkWithIcon', function($url = '/', $text = 'link', $icon = 'external-link', $options = []) 
{
	return "<a href='" . URL::to($url) . "'" . HTML::attributes($options) . "><i class='fa fa-{$icon}'></i>&nbsp;&nbsp;{$text}</a>";
});

/**
 * Generates a delete form
 */
Form::macro('delete', function($url, $text = 'Delete', $button_class = '')
{
	$options['method'] = 'POST';
	$options['url'] = $url;
	$options['class'] = 'delete-form';

	$button_options['type'] = 'submit';
	$button_options['class'] = 'btn btn-danger ' . $button_class;

	return Form::open($options)
		    . "<button" . HTML::attributes($button_options) . "><i class='fa fa-trash-o'></i>&nbsp;{$text}</button>"
		    . Form::close(); 
});