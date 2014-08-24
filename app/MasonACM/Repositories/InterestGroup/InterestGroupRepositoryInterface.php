<?php namespace MasonACM\Repositories\InterestGroup;

interface InterestGroupRepositoryInterface {

	/**
	 * @return array
	 */
	public function getAll();

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