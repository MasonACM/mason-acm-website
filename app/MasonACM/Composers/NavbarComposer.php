<?php namespace MasonACM\Composers;

use MasonACM\Models\LanParty;
use MasonACM\Repositories\InterestGroup\InterestGroupRepositoryInterface;

class NavbarComposer extends BaseComposer {

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
		parent::compose($view);

		$groups = $this->groupRepo->getAll();

		$view->with([
			'groups' => $groups
		]);
	}

}