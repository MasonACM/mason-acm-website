<?php namespace MasonACM\Composers;

use MasonACM\Repositories\InterestGroupRepository;

class NavbarComposer extends BaseComposer {

	/**
	 * @var InterestGroupRepository
	 */
	private $groupRepo;

	/**
	 * @param InterestGroupRepository $groupRepo
	 */
	public function __construct(InterestGroupRepository $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	/**
	 * @param  string $view 
	 */
	public function compose($view)
	{
		parent::compose($view);

		$groups = $this->groupRepo->getAll();

		$view->with([
			'groups' => $groups
		]);
	}

}