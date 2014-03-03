<?php 

class SIGController extends BaseController {
	protected $layout = "layouts.master";

	public function getIndex() 
	{
		$all_SIG = array();

		foreach (SIG::all() as $SIG) {
			array_push($all_SIG, $SIG);
		}
		
		return View::make('sig.main')->with('all_SIG', $all_SIG);
	}

	public function getNew()
	{
		$this->layout->title = "New SIG";
		$this->layout->content = View::make('sig.create-sig');
	}

	public function getEdit($id)
	{
		$sig = SIG::find($id);

		return View::make('sig.edit-sig', compact('sig'));
	}

	public function Display($url)
	{
		$row = SIG::where('url', $url);
		$sig = $row->first();

		if ($row->count() != 0)
		{
			return View::make('sig.sig', compact('sig'));
		}
		else {
			return Redirect::to('sig');
		}
	}

	public function postCreatesig()
	{
		$sig = new SIG;
		$sig->fill(Input::all());
		$sig->save();

		return Redirect::to('sig');
	}
	
	public function postEdit()
	{
		$sig = SIG::find(Input::get('id'));
		$sig->fill(Input::all());
		$sig->save();

		return Redirect::to('sig');
	}

	public function postDelete($id)
	{
		$sig = SIG::find($id);
		$sig->delete();
		return Redirect::to('sig');
	}
}