<?php

use MasonACM\Repositories\LanParty\LanPartyRepositoryInterface;

class LanPartyController extends BaseController {

    /**
     * @var LanPartyRepositoryInterface
     */
    private $lanPartyRepo;

    /**
     * Create a LanPartyController
     *
     * @param LanPartyRepositoryInterface$lanPartyRepo 
     */
    public function __construct(LanPartyRepositoryInterface $lanPartyRepo)
	{
		$this->lanPartyRepo = $lanPartyRepo;
	}

	/**
	 * Displays the LAN Party management page
     *
     * @return Response
	 */ 
	public function index()
	{
		$lans = $this->lanPartyRepo->getAllParties();

		return View::make('lanparty.manage', compact('lans'));
	}

	/**
	 * Display the LAN Party roster
	 * 
	 * @return Response 
	 */
	public function show($id)
	{
		$attendees = $this->lanPartyRepo->findPartyById($id)->attendees;
        $lan = $this->lanPartyRepo->findPartyById($id);

		return View::make('lanparty.roster.index', compact('attendees', 'lan'));	
	}

	/**
	 * Create a LAN Party
	 * 
	 * @return Response
	 */ 
    public function store()
    {
    	$this->lanPartyRepo->createParty(Input::all());

    	return Redirect::back();
    }

    /**
     * Update a specified LAN Party
     * 
     * @return Response
     */ 
    public function update($id)
    {
    	$this->lanPartyRepo->updateParty($id, Input::all());

    	return Redirect::back();
    }

    /**
     * Delete a specified LAN Party
     * 
     * @return Response
     */ 
    public function destroy($id)
    {
    	$this->lanPartyRepo->deleteParty($id);

    	return Redirect::back();
    }

    /**
     * Make a specified LAN Party Active
     *
     * @return Response  
     */
    public function activate($id)
    {
    	$party = $this->lanPartyRepo->setActiveParty($id);

    	return Redirect::back();
    }

    /**
     * Make a specified LAN Party inactive
     * 
     * @return Response 
     */ 
    public function deactivate($id)
    {
    	$party = $this->lanPartyRepo->setPartyActivity($id, false);

    	return Redirect::back();
    }

    public function test()
    {
        return $this->lanPartyRepo->getAllParties();
    }
}