<?php namespace MasonACM\Presenters;

use Carbon\Carbon;

class LanPartyPresenter extends Presenter {

	/**
	 * Formates the date
	 * 
	 * @return String
	 */ 
    public function formattedDate()
    {
    	$carbon = new Carbon($this->date);

    	return $carbon->format('M jS');
    }
}
