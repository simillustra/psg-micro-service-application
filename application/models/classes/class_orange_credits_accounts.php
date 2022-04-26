<?php
/*
* =======================================================================
* CLASSNAME:        orange_credits_accounts
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_accounts
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* IMPORTANT:
* 'post()' is a defined function located @ libries/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credits_accounts
{
    public $id;
    public $acct_number;
    public $user_id;
    public $acct_status;
    public $acct_opendate;
    public $account_type;
    public $account_balance;
    public $account_point_balance;
    public $createdAt;
    public $modifiedAt;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->acct_number = isset($acct_number);
        $this->user_id = isset($user_id);
        $this->acct_status = isset($acct_status);
        $this->acct_opendate = isset($acct_opendate);
        $this->account_type = isset($account_type);
        $this->account_balance = isset($account_balance);
        $this->account_point_balance = isset($account_point_balance);
        $this->createdAt = isset($createdAt);
        $this->modifiedAt = isset($modifiedAt);
    }
}