
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_loan_type
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_loan_type
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_loan_type
	{
	public $id;
	public $loan_name; 
	public $prefix; 
	public $maximum_amount; 
	public $minimum_amount; 
	public $loan_tenure; 
	public $activation_charge; 
	public $interest; 
	public $status; 
	public $createdAt; 
	public $modifiedAt; 
	public $user_id; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->loan_name = isset($loan_name);
	$this->prefix = isset($prefix);
	$this->maximum_amount = isset($maximum_amount);
	$this->minimum_amount = isset($minimum_amount);
	$this->loan_tenure = isset($loan_tenure);
	$this->activation_charge = isset($activation_charge);
	$this->interest = isset($interest);
	$this->status = isset($status);
	$this->createdAt = isset($createdAt);
	$this->modifiedAt = isset($modifiedAt);
	$this->user_id = isset($user_id);
	}
	}