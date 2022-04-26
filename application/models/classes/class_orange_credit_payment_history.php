
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_payment_history
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_payment_history
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_payment_history
	{
	public $id;
	public $userid; 
	public $account_id; 
	public $payment_method; 
	public $loan_id; 
	public $amount; 
	public $status; 
	public $transaction_id; 
	public $ref_id; 
	public $charged_day; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->userid = isset($userid);
	$this->account_id = isset($account_id);
	$this->payment_method = isset($payment_method);
	$this->loan_id = isset($loan_id);
	$this->amount = isset($amount);
	$this->status = isset($status);
	$this->transaction_id = isset($transaction_id);
	$this->ref_id = isset($ref_id);
	$this->charged_day = isset($charged_day);
	}
	}