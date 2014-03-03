<?php

/**
 * This class is only to be used for 
 * users to download files uploaded
 * by ADMINS only, as there is no
 * filter of what files can be uploaded.
 */

class FileController extends BaseController {

	/**
	 * Downloads file from /public/downloadable/ 
	 * @param $file_name the name of the file (extension included)
	 * @return a download response
	 */
	public function getDownload($file_name) 
	{
		$header = array('Content-Type'=>'application/octet-stream');
		$path = public_path()."/downloadable/" . $file_name;

        return Response::download($path, null, $header);	
	}

	public function getUpload()
	{
		// Make sure user is admin
		if (Auth::user()->role >= 1) 
			return View::make('file.upload');
		else
			return Redirect::to('/')->with('message', 'Access Denied');
	}

	public function postUpload()
	{
		$name = Input::file('file')->getClientOriginalName();
		Input::file('file')->move(public_path() .'/downloadable/', $name);
		return Redirect::to('/')->with('message', 'File Uploaded');
	}
}