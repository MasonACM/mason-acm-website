<?php namespace MasonACM\Models;

class LanParty extends EloquentModel {

	/**
	 * @var string
	 */
	protected $table = 'lan_partys';

	/**
	 * @var array
	 */ 
	protected $rules = [
		'date'   => 'date',
		'active' => 'boolean'
	];	

}