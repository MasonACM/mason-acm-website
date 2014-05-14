<?php

class APIController extends BaseController 
{
	public function getSig()
	{
		return SIG::all();
	}
}
