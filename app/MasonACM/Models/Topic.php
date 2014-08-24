<?php namespace MasonACM\Models;

class ForumTopic extends EloquentModel {

	/**
	 * @var string
	 */
	protected $table = 'forum_topics';

	/**
	 * @var array
	 */
	protected $fillable = ['name', 'description'];

	/**
	 * @var array
	 */
	protected static $rules = [
		'name'        => 'required',
		'description' => 'required'
	];

	/**
	 * @return \Collection
	 */
	public function threads()
	{
		return $this->hasMany('ForumThread', 'topic_id');
	}

}
