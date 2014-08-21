<?php

use MasonACM\Models\Game;
use MasonACM\Models\LanParty;
use MasonACM\Exceptions\ModelNotValidException;

class GameController extends BaseController {

	/**
	 * @var Game;
	 */ 
	private $game;

	/**
	 * @param Game;
	 */ 
	public function __construct(Game $game)
	{
		$this->game = $game;
	}

	/**
	 * @return Response
	 */ 
	public function index()
	{
		$games = $this->game->getActiveGames();

		return View::make('lanparty.games.index', compact('games'));
	}

	/**
	 * @return Response
	 */ 
	public function store()
	{
		$input = Input::all();

		$input['lanparty_id'] = LanParty::getActiveParty()->id;

		try
		{
			$game = $this->game->createAndValidate($input);

			return Redirect::back();
		}
		catch (ModelNotValidException $e)
		{
			return Redirect::back()->withErrors($e->errors())->withInput();
		}
	}

	/**
	 * @return Response
	 */
	public function destroy($id)
	{	
		$this->game->find($id)->delete();

		return Redirect::back();
	}
}