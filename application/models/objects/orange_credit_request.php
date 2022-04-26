
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_request_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_request.php');

class orange_credit_request_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_request LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_request");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_request");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_request", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_request", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_request");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
       // $bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_request", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($credit_request_type, $credit_request_beneficary, $credit_request_beneficary_school,
        $credit_request_annual_school_fees, $credit_request_monthly_contribution, $credit_request_charge,
        $credit_request_status, $credit_request_activated, $credit_request_transction_code,
        $credit_request_approved_by, $credit_request_approvedAt, $credit_request_date_createdAt,
        $credit_request_date_modifiedAt, $user_id)
    {

        $values = array(array(
                'credit_request_type' => $credit_request_type,
                'credit_request_beneficary' => $credit_request_beneficary,
                'credit_request_beneficary_school' => $credit_request_beneficary_school,
                'credit_request_annual_school_fees' => $credit_request_annual_school_fees,
                'credit_request_monthly_contribution' => $credit_request_monthly_contribution,
                'credit_request_charge' => $credit_request_charge,
                'credit_request_status' => $credit_request_status,
                'credit_request_activated' => $credit_request_activated,
                'credit_request_transction_code' => $credit_request_transction_code,
                'credit_request_approved_by' => $credit_request_approved_by,
                'credit_request_approvedAt' => $credit_request_approvedAt,
                'credit_request_date_createdAt' => $credit_request_date_createdAt,
                'credit_request_date_modifiedAt' => $credit_request_date_modifiedAt,
                'user_id' => $user_id));
        HDB::hus()->Hinsert('orange_credit_request', $values);
    }

    // UPDATE
    public function Update($credit_request_type, $credit_request_beneficary, $credit_request_beneficary_school,
        $credit_request_annual_school_fees, $credit_request_monthly_contribution, $credit_request_charge,
        $credit_request_status, $credit_request_activated, $credit_request_transction_code,
        $credit_request_approved_by, $credit_request_approvedAt, $credit_request_date_createdAt,
        $credit_request_date_modifiedAt, $user_id, $id)
    {
        $sql = "  credit_request_type =:credit_request_type,credit_request_beneficary =:credit_request_beneficary,credit_request_beneficary_school =:credit_request_beneficary_school,credit_request_annual_school_fees =:credit_request_annual_school_fees,credit_request_monthly_contribution =:credit_request_monthly_contribution,credit_request_charge =:credit_request_charge,credit_request_status =:credit_request_status,credit_request_activated =:credit_request_activated,credit_request_transction_code =:credit_request_transction_code,credit_request_approved_by =:credit_request_approved_by,credit_request_approvedAt =:credit_request_approvedAt,credit_request_date_createdAt =:credit_request_date_createdAt,credit_request_date_modifiedAt =:credit_request_date_modifiedAt,user_id =:user_id WHERE id = :id ";
        $data = array(
            ':credit_request_type' => $credit_request_type,
            ':credit_request_beneficary' => $credit_request_beneficary,
            ':credit_request_beneficary_school' => $credit_request_beneficary_school,
            ':credit_request_annual_school_fees' => $credit_request_annual_school_fees,
            ':credit_request_monthly_contribution' => $credit_request_monthly_contribution,
            ':credit_request_charge' => $credit_request_charge,
            ':credit_request_status' => $credit_request_status,
            ':credit_request_activated' => $credit_request_activated,
            ':credit_request_transction_code' => $credit_request_transction_code,
            ':credit_request_approved_by' => $credit_request_approved_by,
            ':credit_request_approvedAt' => $credit_request_approvedAt,
            ':credit_request_date_createdAt' => $credit_request_date_createdAt,
            ':credit_request_date_modifiedAt' => $credit_request_date_modifiedAt,
            ':user_id' => $user_id,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_request', $sql, $data);

    }


} // end class


?>
	
	