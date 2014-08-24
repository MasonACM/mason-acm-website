<?php

use MasonACM\Exceptions\ModelNotValidException;
use MasonACM\Models\Competitor;
use MasonACM\Models\Team;

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

	public function storeTeam($competitionId)
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
			return Redirect::back()->withErrors($e->errors())->withInput();
		}
	}

	/**
	 * @param $competitionId
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function storeCompetitor($competitionId)
	{
		$input = Input::all();

		$input['user_id'] = Auth::id();

		// If the user is signing up for a non-team based
		// competition, then create a new "Team"
		// where they are the only member
		if ( ! array_key_exists('team_id', $input))
		{
			$team = $this->team->createAndValidate(['competition_id' => $competitionId]);

			$input['team_id'] = $team->id;
		}
		else
		{
			$team = $this->team->find($input['team_id']);
		}

		if ($team->isFull())
		{
			return Redirect::back()->withFlashMessage('Sorry, this team is full.');
		}

		$this->competitor->createAndValidate($input);

		return Redirect::back();
	}

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse|void
	 * @throws Exception
	 */
	public function deleteTeam($id)
	{
		$team  = $this->team->find($id);

		if ($team->canBeDeleted())
		{
			$team->competitors->delete();

			$team->delete();

			return Redirect::back();
		}

		App::abort(403);
	}

	/**
	 * @param  int $id
	 * @return \Illuminate\Http\RedirectResponse
	 * @throws Exception
	 */
	public function deleteCompetitor($teamId)
	{
		$competitor = $this->competitor->where('team_id', $teamId)->where('user_id', Auth::id())->first();

		// If the competitor is not being deleted by its corresponding
		// user or an admin, return a 403 error
		if ($competitor->user_id != Auth::id() && ! Auth::admin()) App::abort(403);

		// If the competitor is the only member of the team, delete it
		if ($competitor->team->competitors()->count() <= 1) $competitor->team->delete();

		$competitor->delete();

		return Redirect::back();
	}

}