<?php namespace MasonACM\Composers;

use MasonACM\Models\LanParty;
use MasonACM\Repositories\InterestGroup\InterestGroupRepositoryInterface;

class NavbarComposer {

	/**
	 * @var InterestGroupRepositoryInterface
	 */
	private $groupRepo;

	/**
	 * @param InterestGroupRepositoryInterface $groupRepo
	 */
	public function __construct(InterestGroupRepositoryInterface $groupRepo)
	{
		$this->groupRepo = $groupRepo;
	}

	/**
	 * @param  string $view 
	 */
	public function compose($view)
	{
		$activeLanParty = LanParty::hasActiveParty();

		$groups = $this->groupRepo->getAll();

		$view->with([
			'groups' => $groups,
			'activeLanParty' => $activeLanParty
		]);
	}

}