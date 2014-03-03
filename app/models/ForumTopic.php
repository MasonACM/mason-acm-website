<?php

class ForumTopic extends Eloquent
{
	protected $table = 'forum_topics';
	protected $guarded = ['id'];

	public function getFirstFiveThreads($id)
	{
		return ForumThread::where('topic_id', $id)
						  ->take(5)
						  ->get();
	}

	public function getThreads($id)
	{
		return ForumThread::where('topic_id', $id)->get();
	}

	public function getNumThreads()
	{
		return ForumThread::where('topic_id', $this->id)->count();
	}
}