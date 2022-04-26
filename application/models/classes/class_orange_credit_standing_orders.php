<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_standing_orders
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* IMPORTANT:
* 'post()' is a defined function located @ libries/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credit_standing_orders
{
    public $id;
    public $payee_id;
    public $payee_name;
    public $payee_account_number;
    public $total_amount;
    public $deductable_amount;
    public $recieving_account;
    public $number_of_payment;
    public $order_status;
    public $payment_frequency;
    public $starting_date;
    public $next_payment_date;
    public $ending_date;
    public $authorizedBy;
    public $reference;
    public $createdAt;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->payee_id = isset($payee_id);
        $this->payee_name = isset($payee_name);
        $this->payee_account_number = isset($payee_account_number);
        $this->total_amount = isset($total_amount);
        $this->deductable_amount = isset($deductable_amount);
        $this->recieving_account = isset($recieving_account);
        $this->number_of_payment = isset($number_of_payment);
        $this->order_status = isset($order_status);
        $this->payment_frequency = isset($payment_frequency);
        $this->starting_date = isset($starting_date);
        $this->next_payment_date = isset($next_payment_date);
        $this->ending_date = isset($ending_date);
        $this->authorizedBy = isset($authorizedBy);
        $this->reference = isset($reference);
        $this->createdAt = isset($createdAt);
    }
}