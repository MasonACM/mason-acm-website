<?php

use MasonACM\Repositories\User\UserRepositoryInterface;

class UserApiController extends ApiController {

    /**
     * @var UserRepositoryInterface
     */ 
    private $userRepo;

    /**
    * @param UserRepositoryInterface $userRepo
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

	public function login()
	{
		$input = Input::all();

		if ($user = $this->userRepo->attemptLogin($input))
        {
        	return Response::json([
				'data' => $this->transform($user)
			], 200);
        }

        return Response::json([
			'error' => [
				'message' => 'Bad credentials'
			]
		], 401);
    }
}