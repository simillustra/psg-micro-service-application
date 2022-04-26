<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_business_plan
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* IMPORTANT:
* 'post()' is a defined function located @ libries/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credit_business_plan
{
    public $id;
    public $business_name;
    public $business_plan_title;
    public $business_address;
    public $business_manager;
    public $business_type;
    public $business_market_demand;
    public $business_sales_frequency;
    public $business_monthly_revenue;
    public $business_investment;
    public $business_investment_duration;
    public $business_estimated_profit_margin;
    public $business_expected_monthly_sales;
    public $business_coupon_code;
    public $business_plan_status;
    public $business_date_applied;
    public $business_date_approved;
    public $business_plan_user;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->business_name = isset($business_name);
        $this->business_plan_title = isset($business_plan_title);
        $this->business_address = isset($business_address);
        $this->business_manager = isset($business_manager);
        $this->business_type = isset($business_type);
        $this->business_market_demand = isset($business_market_demand);
        $this->business_sales_frequency = isset($business_sales_frequency);
        $this->business_monthly_revenue = isset($business_monthly_revenue);
        $this->business_investment = isset($business_investment);
        $this->business_investment_duration = isset($business_investment_duration);
        $this->business_estimated_profit_margin = isset($business_estimated_profit_margin);
        $this->business_expected_monthly_sales = isset($business_expected_monthly_sales);
        $this->business_coupon_code = isset($business_coupon_code);
        $this->business_plan_status = isset($business_plan_status);
        $this->business_date_applied = isset($business_date_applied);
        $this->business_date_approved = isset($business_date_approved);
        $this->business_plan_user = isset($business_plan_user);
    }
}