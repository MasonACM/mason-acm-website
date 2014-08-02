<?php namespace MasonACM\Repositories\InterestGroup;

use MasonACM\Models\InterestGroup;
use File, Markdown, Str;

class InterestGroupRepository implements InterestGroupRepositoryInterface {

	/**
	 * @var string
	 */
	public static $folder;

	/**
	 * @param  string $url
	 * @return InterestGroup
	 */
	public function getByUrl($url)
	{
		if (static::$folder == null)
		{
			$folder = app_path() . '/MasonACM/Static/interest-groups/';
		}

		$file = $folder . $url . '.md';

		if ( ! File::exists($file)) return false;

		$interestGroup = new InterestGroup(
			Str::unslug($url), $url, Markdown::render(File::get($file))
		);

		return $interestGroup;
	}

	/**
	 * @param  string $name
	 * @return string
	 */
	public function create($name)
	{

	}

	/**
	 * @param  string $name 
	 * @param  string $markdown 
	 * @return string 
	 */
	public function update($name, $markdown)
	{

	}

}