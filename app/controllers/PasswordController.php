<?php

class PasswordController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email')))
		{
			case Password::INVALID_USER:
				return Redirect::back()->withErrors(Lang::get($response));

			case Password::REMINDER_SENT:
				return Redirect::back()->withFlashMessage(
					'Password reset email sent.  Check your spam if you don\'t see it in your inbox.'
				);
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'password', 'password_confirmation', 'token'
		);

		$credentials['email'] = DB::table(Config::get('auth.reminder.table'))
			->whereToken($credentials['token'])
			->pluck('email');

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = $password;

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->withFlashMessage(Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::home()
					->withFlashMessage('Password successfully reset!');
		}
	}

	/**
	 * Change a user's password from profile page
	 *
	 * @return Response
	 */
	public function postChange()
	{
		$user = Auth::user();

		$input = Input::only('current-password', 'new-password', 'password-confirmation');

		if ( ! Hash::check($input['current-password'], $user->password))
		{
			return Redirect::back()
				->withFlashMessage('You incorrectly provided your current password.');		
		}

		if ($input['new-password'] != $input['password-confirmation'])
		{
			return Redirect::back()
				->withFlashMessage('Password confirmation does not match.');					
		}

		$user->password = $input['new-password'];

		$user->save();

		return Redirect::back()
			->withFlashMessage('Password successfully reset!');
	}

}
