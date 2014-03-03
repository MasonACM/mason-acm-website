<?php

class LanGameController extends BaseController {
	protected $layout = 'layouts.master';
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->title = "Games";
		$this->layout->content = View::make('lanparty.games');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = "Create Game";
		$this->layout->content = View::make('lanparty.newgame');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$game = new LanGame();

		$game->fill(Input::all());
		$game->save();
		
		return Redirect::to('langames');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$game = LanGame::findorFail($id);
		return $game->Title;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$game = LanGame::findorFail($id);
		$this->layout->content = View::make('lanparty.editgame', compact('game'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$game = LanGame::findorFail($id);
		$game->fill(Input::all());
		$game->save();
		

		return Redirect::to('langames');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$game = LanGame::findorFail($id);

		LanPlayer::where('game_id', $game->id)->delete();
		LanTeam::where('game_id', $game->id)->delete();
		$game->delete();

		return Redirect::to('langames');
	}

}