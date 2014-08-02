<?php namespace MasonACM\Repositories\Eloquent;

use MasonACM\Models\EloquentModel;

abstract class EloquentRepository implements EloquentRepositoryInterface {

	/**
	 * @var EloquentModel
	 */ 
	protected $model;

	/**
	 * Construct the EloquentRepository
	 *
	 * @param EloquentModel $model
	 */
	public function __construct(EloquentModel $model)
	{
		$this->model = $model;
	}

	/**
	 * Get every record of the model.
	 *
	 * @return \Collection
	 */
	public function getAll()
	{
		return $this->model->model->all();
	}

	/**
	 * Get each record of the model in paginated form.
	 * 
	 * @param  int $count
	 * @return \Collection
	 */ 
	public function getAllPaginated($count)
	{
		return $this->model->model->paginate($count);
	}

	/**
	 * Eagerly load a model relationship.
	 *
	 * @param  string $with 
	 * @return \Collection 
	 */
	public function eagerLoad($with)
	{
		return $this->model->with($with)->get();
	}

	/**
	 * Get the model by the specified id.
	 * 
	 * @param  int $id
	 * @return EloquentModel
	 */ 
	public function getById($id)
	{
		return $this->model->find($id);
	}

	/**
	 * Get a single record by a certain field.
	 *
	 * @param  string $field
	 * @param  string $value
	 * @return EloquentModel
	 */ 
	public function getOneByField($field, $value)
	{
		return $this->model->where($field, '=', $value)->first();
	}

	/**
	 * Get multiple records by a certain field.
	 * 
	 * @param  string $field
	 * @param  string $value
	 * @return Collection 
	 */ 
	public function getManyByField($field, $value)
	{
		return $this->model->where($field, '=', $value)->get();
	}

	/**
	 * Get a model by its slug.
	 * 
	 * @param  string $slug
	 * @return EloquentModel 
	 */ 	
	public function getBySlug($slug)
	{
		return $this->model->getOneByField('slug', $slug);
	}

	/**
	 * Create a new model.
	 *
	 * @param  array $input
	 * @return EloquentModel
	 */
	public function create($input)
	{
		return $this->model->createAndValidate($input);
	}

	/**
	 * Update the specified model
	 *
	 * @param  int   $id 
	 * @param  array $input 
	 * @return EloquentModel 
	 */
	public function update($id, $input)
	{
		return $this->model->getById($id)->fill($input)->save();
	}

	/**
	 * Destroy the specified model.
	 * 
	 * @param  int $id
	 * @return bool
	 */ 
	public function destroy($id)
	{
		return $this->model->delete();
	}

}
