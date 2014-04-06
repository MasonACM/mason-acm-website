<?php

class ForumThread extends Eloquent
{
	protected $table = 'forum_threads';
	protected $guarded = ['id'];

	public function posts()
	{
		return $this->hasMany('ForumPost', 'thread_id')->orderBy('created_at');
	}
	
	public function topic()
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