
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_zones
	* DATE CREATED:  	15-04-2020
	* FOR TABLE:  		orange_credit_zones
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_zones
	{
	public $id;
	public $zone_name; 
	public $zone_coverage; 
	public $zone_status; 
	public $zone_city; 
	public $zone_state; 
	public $zone_country; 
	public $zone_createdAt; 
	public $zone_modifiedAt; 
	public $zone_user; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->zone_name = isset($zone_name);
	$this->zone_coverage = isset($zone_coverage);
	$this->zone_status = isset($zone_status);
	$this->zone_city = isset($zone_city);
	$this->zone_state = isset($zone_state);
	$this->zone_country = isset($zone_country);
	$this->zone_createdAt = isset($zone_createdAt);
	$this->zone_modifiedAt = isset($zone_modifiedAt);
	$this->zone_user = isset($zone_user);
	}
	}