
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_transactions
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_transactions
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_transactions
	{
	public $id;
	public $transactionid; 
	public $sender_id; 
	public $sender_account; 
	public $receiver_id; 
	public $receiver_account; 
	public $payment_method; 
	public $amount; 
	public $payment_status; 
	public $transaction_type; 
	public $payment_date; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->transactionid = isset($transactionid);
	$this->sender_id = isset($sender_id);
	$this->sender_account = isset($sender_account);
	$this->receiver_id = isset($receiver_id);
	$this->receiver_account = isset($receiver_account);
	$this->payment_method = isset($payment_method);
	$this->amount = isset($amount);
	$this->payment_status = isset($payment_status);
	$this->transaction_type = isset($transaction_type);
	$this->payment_date = isset($payment_date);
	}
	}