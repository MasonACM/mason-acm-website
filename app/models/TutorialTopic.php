<?php

class TutorialTopic extends Eloquent
{
	protected $table = 'tut_topics';
	
	protected $fillable = [
		'name',
		'picpath',
		'created_at',
		'updated_at'
	];

	public static function getArray()
	{
		return TutorialTopic::lists('name', 'id');
	}

	public function getTuts()
	{
		return $this->hasMany('Tutorial', 'tut_topic_id')->get();
	}
}