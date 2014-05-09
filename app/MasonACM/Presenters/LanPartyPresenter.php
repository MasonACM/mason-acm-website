<?php namespace MasonACM\Presenters;

use Carbon\Carbon;

class LanPartyPresenter extends Presenter {

	/**
	 * Formates the date
	 * 
	 * @return String
	 */ 
    public function shortDate()
    {
    	return $this->date->format('M jS');
    }

    public function longDate()
    {
    	return $this->date->format('F jS, Y');
    }

    public function quickDate()
    {
        return $this->date->format('m/d/y');
    }
}
