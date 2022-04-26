
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_request
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_request
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_request
	{
	public $id;
	public $credit_request_type; 
	public $credit_request_beneficary; 
	public $credit_request_beneficary_school; 
	public $credit_request_annual_school_fees; 
	public $credit_request_monthly_contribution; 
	public $credit_request_charge; 
	public $credit_request_status; 
	public $credit_request_activated; 
	public $credit_request_transction_code; 
	public $credit_request_approved_by; 
	public $credit_request_approvedAt; 
	public $credit_request_date_createdAt; 
	public $credit_request_date_modifiedAt; 
	public $user_id; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->credit_request_type = isset($credit_request_type);
	$this->credit_request_beneficary = isset($credit_request_beneficary);
	$this->credit_request_beneficary_school = isset($credit_request_beneficary_school);
	$this->credit_request_annual_school_fees = isset($credit_request_annual_school_fees);
	$this->credit_request_monthly_contribution = isset($credit_request_monthly_contribution);
	$this->credit_request_charge = isset($credit_request_charge);
	$this->credit_request_status = isset($credit_request_status);
	$this->credit_request_activated = isset($credit_request_activated);
	$this->credit_request_transction_code = isset($credit_request_transction_code);
	$this->credit_request_approved_by = isset($credit_request_approved_by);
	$this->credit_request_approvedAt = isset($credit_request_approvedAt);
	$this->credit_request_date_createdAt = isset($credit_request_date_createdAt);
	$this->credit_request_date_modifiedAt = isset($credit_request_date_modifiedAt);
	$this->user_id = isset($user_id);
	}
	}