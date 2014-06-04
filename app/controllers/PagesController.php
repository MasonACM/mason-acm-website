<?php

class PagesController extends BaseController {

	public function getHome()
	{
		$lanPartyIsActive = LAN_Party::hasActiveParty();

		return View::make('pages.home', compact('lanPartyIsActive'));
	}

	public function getAbout()
	{
		return View::make('pages.about');
	}

	public function getVB()
	{
		return View::make('pages.vb');
	}
}