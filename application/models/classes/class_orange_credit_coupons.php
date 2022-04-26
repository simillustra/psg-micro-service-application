
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_coupons
	* DATE CREATED:  	01-04-2020
	* FOR TABLE:  		orange_credit_coupons
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_coupons
	{
	public $id;
	public $coupon_code; 
	public $coupon_amount; 
	public $coupon_trans_id; 
	public $coupon_payment_mode; 
	public $coupon_status; 
	public $coupon_date_added; 
	public $coupon_date_activated; 
	public $coupon_user; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->coupon_code = isset($coupon_code);
	$this->coupon_amount = isset($coupon_amount);
	$this->coupon_trans_id = isset($coupon_trans_id);
	$this->coupon_payment_mode = isset($coupon_payment_mode);
	$this->coupon_status = isset($coupon_status);
	$this->coupon_date_added = isset($coupon_date_added);
	$this->coupon_date_activated = isset($coupon_date_activated);
	$this->coupon_user = isset($coupon_user);
	}
	}