<?php 

use MasonACM\Repositories\InterestGroup\InterestGroupRepositoryInterface;

class InterestGroupController extends BaseController {	

	/**
	 * @var InterestGroupRepositoryInterface
	 */ 
	private $groupRepo;

	/**
	 * @param  InterestGroupRepositoryInterface $groupRepo 
	 */
	public function __construct(InterestGroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	/**
	 * Display an Interest Group page.
	 *
	 * @param  string $url 
	 * @return Response 
	 */
	public function show($url)	
	{
		if ($interestGroup = $this->groupRepo->getByUrl($url))
		{
			return View::make('interest-group.show', compact('interestGroup'));
		}

		return Redirect::back();
	}

}
