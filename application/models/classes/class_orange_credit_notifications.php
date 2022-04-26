
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_notifications
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_notifications
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_notifications
	{
	public $id;
	public $reciever; 
	public $subject; 
	public $type; 
	public $sms_message; 
	public $email_message; 
	public $status; 
	public $date; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->reciever = isset($reciever);
	$this->subject = isset($subject);
	$this->type = isset($type);
	$this->sms_message = isset($sms_message);
	$this->email_message = isset($email_message);
	$this->status = isset($status);
	$this->date = isset($date);
	}
	}