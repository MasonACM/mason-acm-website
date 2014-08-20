<?php namespace MasonACM\Models;

class Thread extends EloquentModel {

	/**
	 * @var string
	 */
	protected $table = 'forum_threads';

	/**
	 * @var array
	 */
	protected $fillable = ['title', 'topic_id'];

	/**
	 * @var array
	 */
	protected static $rules = [
		'title'    => 'required|max:100',
		'topic_id' => 'number'
	];

	/**
	 * @return \Collection
	 */
	public function posts()
	{
		return $this->hasMany('MasonACM\Models\Post');
	}

	public function getUrl()
	{
		return \URL::route('thread.show', ['id' => $this->id]);
	}

	/**
	 * @return int
	 */ 
	public function replies()
	{
		return $this->posts()->count() - 1;
	}
}