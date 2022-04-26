
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credits_logs
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credits_logs
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credits_logs
	{
	public $id;
	public $action; 
	public $ip_address; 
	public $created_by; 
	public $createdAt; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->action = isset($action);
	$this->ip_address = isset($ip_address);
	$this->created_by = isset($created_by);
	$this->createdAt = isset($createdAt);
	}
	}