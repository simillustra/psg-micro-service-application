
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_messages
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_messages
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_messages
	{
	public $id;
	public $user_to; 
	public $user_from; 
	public $subject; 
	public $message; 
	public $attachment; 
	public $respond; 
	public $sender_open; 
	public $receiver_open; 
	public $sender_delete; 
	public $receiver_delete; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->user_to = isset($user_to);
	$this->user_from = isset($user_from);
	$this->subject = isset($subject);
	$this->message = isset($message);
	$this->attachment = isset($attachment);
	$this->respond = isset($respond);
	$this->sender_open = isset($sender_open);
	$this->receiver_open = isset($receiver_open);
	$this->sender_delete = isset($sender_delete);
	$this->receiver_delete = isset($receiver_delete);
	}
	}