<?php

class ForumThread extends Eloquent
{
	protected $table = 'forum_threads';
	protected $guarded = ['id'];

	public function getPosts()
	{
		return $this->hasMany('ForumPost', 'thread_id')->get();
	}
	
	public function getTopic()
	{
		return ForumTopic::find($this->topic_id);
	}

	public function getReplies()
	{
		$replies = $this->hasMany('ForumPost', 'thread_id')
						->count() - 1;

		if ($replies == 1)
			return "1 Reply";
		else
			return $replies . " Replies";
	}
}