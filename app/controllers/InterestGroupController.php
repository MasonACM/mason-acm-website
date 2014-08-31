<?php 

use MasonACM\Repositories\InterestGroupRepository;

class InterestGroupController extends BaseController {	

	/**
	 * @var InterestGroupRepository
	 */ 
	private $groupRepo;

	/**
	 * @param  InterestGroupRepository $groupRepo 
	 */
	public function __construct(InterestGroupRepository $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	/**
	 * @return Response
	 */ 
	public function index()
	{
		$interestGroups = $this->groupRepo->getAll();

		return View::make('interest-group.index', compact('interestGroups'));
	}

	/**
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
