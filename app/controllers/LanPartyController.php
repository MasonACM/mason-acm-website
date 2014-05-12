<?php

use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LANPartyController extends BaseController {

    /**
     * @var LanPartyRepositoryInterface
     */
    private $lanParty;

    /**
     * Create a LanPartyController
     *
     * @param LanPartyRepositoryInterface $lanParty
     */
    public function __construct(LanPartyRepositoryInterface $lanParty)
	{
		$this->lanParty = $lanParty;
	}

	/**
	 * Displays the LAN Party management page
     *
     * @return Response
	 */ 
	public function index()
	{
		$lans = $this->lanParty->getAllParties();

		return View::make('lanparty.manage', compact('lans'));
	}

	/**
	 * Display the LAN Party roster
	 * 
	 * @return Response 
	 */
	public function show($id)
	{
		$attendees = $this->lanParty->findPartyById($id)->attendees;

		return View::make('lanparty.roster.index', compact('attendees'));	
	}


    public function store()
    {

    }
}