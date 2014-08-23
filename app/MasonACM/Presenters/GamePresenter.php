<?php namespace MasonACM\Presenters;

class GamePresenter extends Presenter {

	/**
	 * @return string
	 */ 
	public function playerCount()
	{
		$output = $count = $this->model->playerCount();

		$output .= $this->model->isTeamBased() ? ' team' : ' player';

		return $output .= $count == 1 ?: 's';
	}

}