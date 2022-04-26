<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_branches
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_branches
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* IMPORTANT:
* 'post()' is a defined function located @ libries/funtions.php
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

//Begin class

class orange_credit_branches
{
    public $id;
    public $branch_code;
    public $branch_name;
    public $branch_address;
    public $branch_city;
    public $branch_state;
    public $branch_country;
    public $parent_id;
    public $zone_coverage;
    public $contact_person;
    public $date_created;

    //Constructor
    public function __construct()
    {
        $this->id = isset($id);
        $this->branch_code = isset($branch_code);
        $this->branch_name = isset($branch_name);
        $this->branch_address = isset($branch_address);
        $this->branch_city = isset($branch_city);
        $this->branch_state = isset($branch_state);
        $this->branch_country = isset($branch_country);
        $this->parent_id = isset($parent_id);
        $this->zone_coverage = isset($zone_coverage);
        $this->contact_person = isset($contact_person);
        $this->date_created = isset($date_created);
    }
}