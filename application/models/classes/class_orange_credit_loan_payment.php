
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_loan_payment
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_loan_payment
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_loan_payment
	{
	public $id;
	public $payment_date; 
	public $paid_amount; 
	public $principle_amount; 
	public $interest_amount; 
	public $balance; 
	public $userid; 
	public $loan_id; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->payment_date = isset($payment_date);
	$this->paid_amount = isset($paid_amount);
	$this->principle_amount = isset($principle_amount);
	$this->interest_amount = isset($interest_amount);
	$this->balance = isset($balance);
	$this->userid = isset($userid);
	$this->loan_id = isset($loan_id);
	}
	}