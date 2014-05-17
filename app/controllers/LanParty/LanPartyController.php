<?php

use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LanPartyController extends BaseController {

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
        $lan = $this->lanParty->findPartyById($id);

		return View::make('lanparty.roster.index', compact('attendees', 'lan'));	
	}

	/**
	 * Create a LAN Party
	 * 
	 * @return Response
	 */ 
    public function store()
    {
    	$this->lanParty->createParty(Input::all());

    	return Redirect::back();
    }

    /**
     * Update a specified LAN Party
     * 
     * @return Response
     */ 
    public function update($id)
    {
    	$this->lanParty->updateParty($id, Input::all());

    	return Redirect::back();
    }

    /**
     * Delete a specified LAN Party
     * 
     * @return Response
     */ 
    public function destroy($id)
    {
    	$this->lanParty->deleteParty($id);

    	return Redirect::back();
    }

    /**
     * Make a specified LAN Party Active
     *
     * @return Response  
     */
    public function activate($id)
    {
    	$party = $this->lanParty->setActiveParty($id);

    	return Redirect::back();
    }

    /**
     * Make a specified LAN Party inactive
     * 
     * @return Response 
     */ 
    public function deactivate($id)
    {
    	$party = $this->lanParty->setPartyActivity($id, false);

    	return Redirect::back();
    }

    public function test()
    {
        return $this->lanParty->getAllParties();
    }
}