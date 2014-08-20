<?php namespace MasonACM\Repositories\Forum;

interface ThreadRepositoryInterface {

	/**
	 * @param  int $count
	 * @return \Paginator
	 */
	public function getAllPaginated($count);

	/**
	 * @param  Thread $thread 
	 * @param  int    $count 
	 * @return \Paginator 
	 */
	public function getPostsPaginated($thread, $count);

	/**
	 * @param int $id
	 */	
	public function delete($id);

}