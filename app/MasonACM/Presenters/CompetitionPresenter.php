<?php namespace MasonACM\Presenters;

class CompetitionPresenter extends Presenter {

	/**
	 * @return string
	 */ 
	public function teamCount()
	{
		$output = $count = $this->model->teams()->count();

		$output .= $this->model->isTeamBased() ? ' team' : ' player';

		$output .= $count == 1 ? '' : 's';

		return $output;
	}

}
