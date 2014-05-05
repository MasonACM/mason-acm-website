<?php

use MasonACM\Presenters\PresentableTrait;

class ForumPost extends Eloquent {

	use PresentableTrait; 

	protected $presenter = 'MasonACM\Presenters\ForumPostPresenter';
	
	protected $table = 'forum_posts';

	protected $guarded = ['id'];

	public function user()
	{
		return $this->belongsTo('User', 'author_id');
	}

	public function thread()
	{
		return $this->belongsTo('ForumThread', 'thread_id');
	}

    public function canBeDeletedByLoggedInUser()
    {
        $user = Auth::user();

        return ($user->isAdmin() || $this->author_id == $user->id);
    }
}	