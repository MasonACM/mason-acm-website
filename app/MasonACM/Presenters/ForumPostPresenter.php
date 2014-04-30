<?php namespace MasonACM\Presenters;

class ForumPostPresenter extends Presenter {

	/**
	 * Formates the date
	 * 
	 * @return String
	 */ 
    public function date()
    {
    	return $this->created_at->diffForHumans();	
    }
}