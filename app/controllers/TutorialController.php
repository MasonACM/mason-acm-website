<?php

class TutorialController extends BaseController 
{
	protected $layout = 'layouts.master';

	public function getIndex()
	{
		return View::make('tutorial.tut-index');
	}

	public function getTutorial($id)
	{
		$tut = Tutorial::find($id);

		return View::make('tutorial.view-tut', compact('tut'));		
	}

	public function getTopic($name)
	{
		$tt = TutorialTopic::where('name', $name)->first();

		return View::make('tutorial.tut-topic', compact('tt'));
	}

	public function getCreate()
	{
		return View::make('tutorial.create-tut');		
	}

	public function postCreate()
	{
		$tut = new Tutorial;
		$tut->fill(Input::all());
		$tut->save();

		return Redirect::to('tutorials/view/' . $tut->id);
	}
	
	public function getEdit($id)
	{
		$tut = Tutorial::findOrFail($id);

		if ((Auth::user()->id == $tut->author_id) || (Auth::user()->role >= 1)) {
			return View::make('tutorial.edit-tut')->with('tut', $tut);
		}	
	}

	public function postEdit($id)
	{
		$tut = Tutorial::findOrFail($id);

		$tut->fill(Input::all());
		$tut->save();		

		return Redirect::to('tutorials/view/' . $tut->id);
	}

	public function postDelete($id)
	{
		$tut = Tutorial::findOrFail($id);
		$id = $tut->topic_id;
		$tut->delete();
		return Redirect::to('tutorials');
	}

}