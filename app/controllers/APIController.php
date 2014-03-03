<?php

/*
	This class Handles all JSON
	request / responses for mobile
	app connections.

*/

class APIController extends \BaseController 
{
	public function getSig()
	{
		return SIG::all();
	}
}
