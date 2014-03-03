<?php

class StaticContentController extends \BaseController {

	protected $layout = "layouts.master";

	public function Display($url)		
	{
		$row = Static_Content::where('url', $url);
		$cont = $row->first();

		if ($row->count() != 0) {
			return View::make('static_content.view', compact('cont'));
		} else {
			return Redirect::to('/')->with('message', 'Page not found');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->title = "Create Page";
		$this->layout->content = View::make('static_content.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$sc = new Static_Content();
		$sc->fill(Input::all());

		$sc->save();

		return Redirect::to($sc->url);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$sc = Static_Content::findOrFail($id);
		
		$this->layout->title = $sc->title . " - Edit"; 
		$this->layout->content = View::make('static_content.edit', compact('sc'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$sc = Static_Content::findorFail($id);
		$sc->fill(Input::all());
		$sc->save();
	
		return Redirect::to($sc->url);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}