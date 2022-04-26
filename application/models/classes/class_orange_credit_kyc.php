
	<?php
	/*
	* =======================================================================
	* CLASSNAME:        orange_credit_kyc
	* DATE CREATED:  	05-03-2020
	* FOR TABLE:  		orange_credit_kyc
	* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
	* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
	* IMPORTANT:		
	* 'post()' is a defined function located @ libries/funtions.php
	* =======================================================================
	*/
	if(!defined('VALID_DIR')) die('You are not allowed to execute this file directly');
	//Begin class
	
	class orange_credit_kyc
	{
	public $id;
	public $customer_fullname; 
	public $customer_date_of_birth; 
	public $customer_gender; 
	public $customer_passport_photo; 
	public $customer_identity_type; 
	public $customer_identity_card; 
	public $customer_contact_address;
    public $customer_country;
    public $customer_state;
    public $customer_city; 
	public $customer_employment_status; 
	public $customer_occupation; 
	public $customer_monthly_income; 
	public $customer_bvn_number; 
	public $customer_bank_name; 
	public $customer_bank_account; 
	public $customer_ec1_fullname; 
	public $customer_ec1_phone; 
	public $customer_ec1_identity_type; 
	public $customer_ec1_id_number; 
	public $customer_ec1_card; 
	public $customer_ec2_fullname; 
	public $customer_ec2_phone; 
	public $customer_ec2_identity_type; 
	public $customer_ec2_id_number; 
	public $customer_ec2_card; 
	public $kyc_updated; 
	public $kyc_status; 
	public $date_created; 
	public $userid; 
	
	//Constructor
	public function __construct()
	{
	$this->id = isset($id);
	$this->customer_fullname = isset($customer_fullname);
	$this->customer_date_of_birth = isset($customer_date_of_birth);
	$this->customer_gender = isset($customer_gender);
	$this->customer_passport_photo = isset($customer_passport_photo);
	$this->customer_identity_type = isset($customer_identity_type);
	$this->customer_identity_card = isset($customer_identity_card);
	$this->customer_contact_address = isset($customer_contact_address);
    $this->customer_country = isset($customer_country);
	$this->customer_state = isset($customer_state);
	$this->customer_city = isset($customer_city);
	$this->customer_employment_status = isset($customer_employment_status);
	$this->customer_occupation = isset($customer_occupation);
	$this->customer_monthly_income = isset($customer_monthly_income);
	$this->customer_bvn_number = isset($customer_bvn_number);
	$this->customer_bank_name = isset($customer_bank_name);
	$this->customer_bank_account = isset($customer_bank_account);
	$this->customer_ec1_fullname = isset($customer_ec1_fullname);
	$this->customer_ec1_phone = isset($customer_ec1_phone);
	$this->customer_ec1_identity_type = isset($customer_ec1_identity_type);
	$this->customer_ec1_id_number = isset($customer_ec1_id_number);
	$this->customer_ec1_card = isset($customer_ec1_card);
	$this->customer_ec2_fullname = isset($customer_ec2_fullname);
	$this->customer_ec2_phone = isset($customer_ec2_phone);
	$this->customer_ec2_identity_type = isset($customer_ec2_identity_type);
	$this->customer_ec2_id_number = isset($customer_ec2_id_number);
	$this->customer_ec2_card = isset($customer_ec2_card);
	$this->kyc_updated = isset($kyc_updated);
	$this->kyc_status = isset($kyc_status);
	$this->date_created = isset($date_created);
	$this->userid = isset($userid);
	}
	}