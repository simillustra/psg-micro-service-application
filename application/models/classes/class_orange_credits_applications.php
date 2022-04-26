
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credits_applications
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credits_applications
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credits_applications
	{
	public $id;
	public $activation_code; 
	public $request_beneficary; 
	public $request_type; 
	public $sponsor_id; 
	public $amount_requested; 
	public $amount_approved; 
	public $activation_charge; 
	public $monthly_repayment; 
	public $total_repayment; 
	public $total_interest; 
	public $application_status; 
	public $createdAt; 
	public $charge_account_every; 
	public $monthly_repayment_starts; 
	public $monthly_repayment_ends; 
	public $comments; 
	public $approved_by; 
	public $approvedAt; 
	public $has_standing_order; 
	public $standing_order_id; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->activation_code = isset($activation_code);
	$this->request_beneficary = isset($request_beneficary);
	$this->request_type = isset($request_type);
	$this->sponsor_id = isset($sponsor_id);
	$this->amount_requested = isset($amount_requested);
	$this->amount_approved = isset($amount_approved);
	$this->activation_charge = isset($activation_charge);
	$this->monthly_repayment = isset($monthly_repayment);
	$this->total_repayment = isset($total_repayment);
	$this->total_interest = isset($total_interest);
	$this->application_status = isset($application_status);
	$this->createdAt = isset($createdAt);
	$this->charge_account_every = isset($charge_account_every);
	$this->monthly_repayment_starts = isset($monthly_repayment_starts);
	$this->monthly_repayment_ends = isset($monthly_repayment_ends);
	$this->comments = isset($comments);
	$this->approved_by = isset($approved_by);
	$this->approvedAt = isset($approvedAt);
	$this->has_standing_order = isset($has_standing_order);
	$this->standing_order_id = isset($standing_order_id);
	}
	}