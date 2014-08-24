<?php

use MasonACM\Forms\ProfileForm;

class ProfileController extends BaseController {

    /**
     * @var ProfileForm
     */ 
    private $profileForm;

	/**
	 * Create the profile controller 
	 * @param ProfileForm $profileForm
	 */ 
	public function __construct(ProfileForm $profileForm)
	{
		$this->profileForm = $profileForm;
	}

	/**
	 * Display the edit profile page
	 * 
	 * @return Response
	 */ 
	public function edit()
	{
		$user = Auth::user();

		return View::make('profile.edit', compact('user'));
	}

	/**
	 * Update a profile
	 * 
	 * @return Response
	 */ 
	public function update()
	{
		$user = Auth::user();

		$input = Input::all(); 
		
        $this->profileForm->validate($input);

		$user->fill($input)->save();

		return Redirect::to('/')
			->withFlashMessage('Profile updated');
	}
}