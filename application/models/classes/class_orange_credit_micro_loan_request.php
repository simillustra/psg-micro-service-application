<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_micro_loan_request
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* IMPORTANT:
* 'post()' is a defined function located @ libries/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credit_micro_loan_request
{
    public $id;
    public $loan_type;
    public $business_type;
    public $monthly_revenue;
    public $loan_request_amount;
    public $loan_repayment_amount;
    public $loan_tenure;
    public $loan_interest;
    public $activation_fee;
    public $loan_request_deposit;
    public $request_date;
    public $loan_status;
    public $userid;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->loan_type = isset($loan_type);
        $this->business_type = isset($business_type);
        $this->monthly_revenue = isset($monthly_revenue);
        $this->loan_request_amount = isset($loan_request_amount);
        $this->loan_repayment_amount = isset($loan_repayment_amount);
        $this->loan_tenure = isset($loan_tenure);
        $this->loan_interest = isset($loan_interest);
        $this->activation_fee = isset($activation_fee);
        $this->loan_request_deposit = isset($loan_request_deposit);
        $this->request_date = isset($request_date);
        $this->loan_status = isset($loan_status);
        $this->userid = isset($userid);
    }
}