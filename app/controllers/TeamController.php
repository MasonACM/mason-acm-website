<?php

use MasonACM\Models\Team;
use MasonACM\Models\Competitor;
use MasonACM\Exceptions\ModelNotValidException;

class TeamController extends \BaseController {

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

		$input['user_id'] = Auth::id();

		// If the user is signing up for a non-team based
		// competition, then create a new "Team"
		// where they are the only member
		if ( ! array_key_exists('team_id', $input))
		{
			$team = $this->team->createAndValidate([
				'competition_id' => $competitionId
			]);

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
	 * @return Response
	 */
	public function destroy($id)
	{
		$team = $this->team->find($id);

		if ($team->canBeDeleted())
		{
			$team->competitors->delete();

			$team->delete();

			return Redirect::back();
		}

		App::abort(403);
	}

}
