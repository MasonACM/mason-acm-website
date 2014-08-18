<?php namespace MasonACM\Repositories\Eloquent;

interface EloquentRepositoryInterface {

	public function getAll();

	/**
	 * @param  int $count
	 */
	public function getAllPaginated($count);
		
	/**
	 * @param  int $id
	 */ 
	public function getById($id);

	/**
	 * @param  string $field
	 * @param  string $value
	 */ 
	public function getOneByField($field, $value);

	/**
	 * @param  string $field
	 * @param  string $value
	 */
	public function getManyByField($field, $value);

	/**
	 * @param  string $slug
	 */ 	
	public function getBySlug($slug);
	
	/**
	 * @param  array $input
	 */
	public function create($input);	

	/**
	 * @param  int   $id 
	 * @param  array $input 
	 */
	public function update($id, $input);

 	/**
	 * @param  int $id
	 */ 
	public function destroy($id);

}