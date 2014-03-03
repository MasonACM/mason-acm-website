<?php

use Carbon\Carbon;

class Tutorial extends Eloquent
{
	protected $table = 'tuts';
	
	protected $fillable = [
		'body',
		'title',
		'tut_topic_id',
		'author_id',
		'created_at',
		'updated_at'
	];

	public function getDate() 
	{
        if ($this->created_at->diffInDays() > 30)        
            return $this->created_at->toFormattedDateString();        
        else 
            return $this->created_at->diffForHumans();        
    }

    public function getTopic()
    {
    	return TutorialTopic::find($this->tut_topic_id);
    }

    public function getAuthor()
    {
    	return User::find($this->author_id);
    }
}