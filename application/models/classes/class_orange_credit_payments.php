
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_payments
	* DATE CREATED:  	01-04-2020
	* FOR TABLE:  		orange_credit_payments
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_payments
	{
	public $id;
	public $transaction_id; 
	public $transaction_amount; 
	public $transaction_desc; 
	public $transaction_provider; 
	public $transaction_status; 
	public $transaction_date; 
	public $transaction_user; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->transaction_id = isset($transaction_id);
	$this->transaction_amount = isset($transaction_amount);
	$this->transaction_desc = isset($transaction_desc);
	$this->transaction_provider = isset($transaction_provider);
	$this->transaction_status = isset($transaction_status);
	$this->transaction_date = isset($transaction_date);
	$this->transaction_user = isset($transaction_user);
	}
	}