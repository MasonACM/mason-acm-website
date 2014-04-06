<?php 

class SIGController extends BaseController {
	
	public function getIndex() 
	{
		$all_sig = SIG::all();
		$admin = Auth::check() && Auth::user()->isAdmin();

		return View::make('sig.index', compact('all_sig', 'admin'));
	}

	public function getCreate()
	{
		return View::make('sig.create');
	} 

	public function getEdit($id)
	{
		$sig = SIG::find($id);

		return View::make('sig.edit', compact('sig'));
	}

	public function getView($url)
	{
		$row = SIG::where('url', $url);
		$sig = $row->first();
		$admin = Auth::check() && Auth::user()->isAdmin();

		if ($row->count() != 0)
			return View::make('sig.sig', compact('sig', 'admin'));
		else  
			return Redirect::to('sig'); 
	}

	public function postCreate()
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