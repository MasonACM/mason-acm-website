<?php

class PagesController extends BaseController {

	/**
	 * @return Response
	 */
	public function getHome()
	{
		return View::make('pages.home');
	}

	/**
	 * @return Response
	 */
	public function getAbout()
	{
		return View::make('pages.about');
	}

	/**
	 * @return Response
	 */
	public function getVB()
	{
		return View::make('pages.vb');
	}
}
