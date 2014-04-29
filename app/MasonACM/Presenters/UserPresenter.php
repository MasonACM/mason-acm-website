<?php namespace MasonACM\Presenters;

class UserPresenter extends Presenter {

	/**
	 * Gets a user's full name
	 * 
	 * @return String
	 */ 
    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function accountAge()
    {
    	return $this->created_at->diffForHumans();
    }
}