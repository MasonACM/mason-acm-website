<?php

use MasonACM\Models\Team;
use MasonACM\Models\Competitor;
use MasonACM\Exceptions\ModelNotValidException;

class CompetitorController extends \BaseController {

	/**
	 * @var Team
	 */
	private $team;

	/**
	 * @var Competitor
	 */
	private $competitor;

	/**
	 * @param Competitor $competitor
	 * @param Team       $team
	 */
	function __construct(Competitor $competitor, Team $team)
	{
		$this->competitor = $competitor;
		$this->team = $team;
	}

	/**
	 * @param  int $competitionId
	 * @return Response
	 */
	public function store($competitionId)
	{
		$input = Input::all();

		try
		{
			$input['competition_id'] = $competitionId;

			$team = $this->team->createAndValidate($input);

			$input['team_id'] = $team->id;

			$input['user_id'] = Auth::id();

			$this->competitor->createAndValidate($input);

			return Redirect::back();
		}
		catch (ModelNotValidException $e)
		{
			return Redirect::back()
				->withErrors($e->errors())->withInput();
		}
	}

	/**
	 * @param  int $id
	 * @return Response
	 */
	public function destroy($teamId)
	{
		$competitor = $this->competitor
			->where('team_id', $teamId)
			->where('user_id', Auth::id())
			->first();

		// If the competitor is not being deleted by its corresponding
		// user or an admin, return a 403 error
		if ($competitor->user_id != Auth::id() && ! Auth::admin()) App::abort(403);

		// If the competitor is the only member of the team, delete it
		if ($competitor->team->competitors()->count() <= 1) $competitor->team->delete();

		$competitor->delete();

		return Redirect::back();
	}

}
