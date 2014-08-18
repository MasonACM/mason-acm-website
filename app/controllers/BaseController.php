<?php

use Illuminate\Http\JsonResponse;

class BaseController extends Controller {

	/**
	 * @param  string $view
	 * @param  array $data
	 * @return Response
	 */
	public function jsonOrView($view, $data)
	{
		if (Request::wantsJson())
		{
			return new JsonResponse($data);
		}

		return View::make($view)->with($data);
	}

	/**
	 * @param  string $route
	 * @param  array $data
	 * @return Response
	 */
	public function jsonOrRedirectRoute($route, $data)
	{
		if (Request::wantsJson())
		{
			return new JsonResponse($data);
		}

		return Redirect::route($route);
	}
}