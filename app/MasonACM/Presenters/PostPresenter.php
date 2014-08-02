<?php namespace MasonACM\Presenters;

class PostPresenter extends Presenter {

	/**
	 * Formate the date
	 * 
	 * @return String
	 */ 
    public function date()
    {
    	return $this->created_at->diffForHumans();
    }

}
