<?php

class ForumThread extends Eloquent
{
	protected $table = 'forum_threads';

	protected $fillable = [
        'author_id',
        'title',
        'topic_id'
    ];

	public function posts()
	{
		return $this->hasMany('ForumPost', 'thread_id');
	}

    /**
     * Gets the posts ordered by their creation date
     *
     * @return Collection
     */
    public function getPosts()
    {
        return $this->posts()->orderBy('created_at');
    }
	
	public function topic()
	{
        return $this->belongsTo('ForumTopic', 'topic_id');
	}

	public function replies()
	{
	    return $this->posts()->count() - 1;
	}
}