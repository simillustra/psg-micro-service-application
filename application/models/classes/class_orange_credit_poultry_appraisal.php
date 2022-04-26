<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_poultry_appraisal
* DATE CREATED:  	26-04-2022
* FOR TABLE:  		orange_credit_poultry_appraisal
* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
* IMPORTANT:
* 'post()' is a defined function located @ lib/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credit_poultry_appraisal
{
    public $id;
    public $poultry_farm_name;
    public $poultry_farm_address;
    public $poultry_farm_management_style;
    public $poultry_farm_produce_type;
    public $poultry_farm_total;
    public $poultry_farm_revenue_cycle;
    public $poultry_farm_revenue;
    public $poultry_farm_profit_margin;
    public $poultry_farm_date_created;
    public $poultry_farm_date_mordified;
    public $user_id;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->poultry_farm_name = isset($poultry_farm_name);
        $this->poultry_farm_address = isset($poultry_farm_address);
        $this->poultry_farm_management_style = isset($poultry_farm_management_style);
        $this->poultry_farm_produce_type = isset($poultry_farm_produce_type);
        $this->poultry_farm_total = isset($poultry_farm_total);
        $this->poultry_farm_revenue_cycle = isset($poultry_farm_revenue_cycle);
        $this->poultry_farm_revenue = isset($poultry_farm_revenue);
        $this->poultry_farm_profit_margin = isset($poultry_farm_profit_margin);
        $this->poultry_farm_date_created = isset($poultry_farm_date_created);
        $this->poultry_farm_date_mordified = isset($poultry_farm_date_mordified);
        $this->user_id = isset($user_id);
    }
}