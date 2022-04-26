
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_organisation
	* DATE CREATED:  	15-04-2020
	* FOR TABLE:  		orange_credit_organisation
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_organisation
	{
	public $id;
	public $organisation_name; 
	public $organisation_address; 
	public $organisation_phone; 
	public $organisation_email; 
	public $organisation_logo; 
	public $organisation_bank_name; 
	public $organisation_account_number; 
	public $organisation_status; 
	public $organisation_createdAt; 
	public $organisation_modifiedAt; 
	public $userid; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->organisation_name = isset($organisation_name);
	$this->organisation_address = isset($organisation_address);
	$this->organisation_phone = isset($organisation_phone);
	$this->organisation_email = isset($organisation_email);
	$this->organisation_logo = isset($organisation_logo);
	$this->organisation_bank_name = isset($organisation_bank_name);
	$this->organisation_account_number = isset($organisation_account_number);
	$this->organisation_status = isset($organisation_status);
	$this->organisation_createdAt = isset($organisation_createdAt);
	$this->organisation_modifiedAt = isset($organisation_modifiedAt);
	$this->userid = isset($userid);
	}
	}