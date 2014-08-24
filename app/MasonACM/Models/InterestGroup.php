<?php namespace MasonACM\Models;

/**
 * @property string $title
 * @property string $url
 * @property string $html
 */ 
class InterestGroup extends \stdClass {

	/**
	 * @param string $title
	 * @param string $url 
	 * @param string $html 
	 */
	public function __construct($title = '', $url = '', $html = '')
	{
		$this->title = $title;
		$this->url = $url;
		$this->html = $html;
	}

	public static function create($filename)
	{
		return new InterestGroup(
			\Str::unslug(basename($filename, '.md')),
			\URL::route('sig.show', basename($filename, '.md'))
		);
	}
}