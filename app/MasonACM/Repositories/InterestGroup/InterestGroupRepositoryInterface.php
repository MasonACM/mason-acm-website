<?php namespace MasonACM\Repositories\InterestGroup;

interface InterestGroupRepositoryInterface {

	/**
	 * @param  string $url
	 * @return string
	 */
	public function getByUrl($url);

	/**
	 * @param  string $name
	 * @return string
	 */
	public function create($name);

	/**
	 * @param  string $name 
	 * @param  string $markdown 
	 * @return string 
	 */
	public function update($name, $markdown);

}