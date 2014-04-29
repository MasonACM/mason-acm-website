<?php

/**
* Filters HTML input to contain only basic HTML
* 
* @var input The HTML input
* @return The basic-HTML-filtered output
*/
function basic_html($input) 
{
	return strip_tags($input, '<html><body><head><a><b><strong><i><em><s><br><hr><p><ul><ol><li><blockquote><h1><h2><h3><h4><h5><h6><div><span>');
}