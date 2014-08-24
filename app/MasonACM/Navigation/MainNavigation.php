<?php namespace MasonACM\Navigation;

use bhoeting\NavigationBuilder\AbstractNavigation;

class MainNavigation extends AbstractNavigation {

	protected $items = [
		'forum' => [
			'icon' => 'comments'
		],
		'about' => [
			'icon' => 'info-circle'
		],
		'vb' => [
			'text' => 'Download VB6',
			'icon' => 'cloud-download'
		]
	];

}