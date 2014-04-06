<?php

class ForumTopic extends Eloquent
{
	protected $table = 'forum_topics';
	protected $guarded = ['id'];

	public function getFirstFiveThreads()
	{
		return ForumThread::where('topic_id', $this->id)
						  ->take(5)
						  ->get();
	}

	public function threads()
	{
		return $this->hasMany('ForumThread', 'topic_id');
	}

	public function getNumThreads()
	{
		return $this->threads()->count(); 
	}
}