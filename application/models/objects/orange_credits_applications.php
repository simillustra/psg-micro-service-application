<?php
/*
* =======================================================================
* CLASSNAME:        orange_credits_applications_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_applications
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credits_applications.php');

class orange_credits_applications_model
{

    private $orange_credits_applications_table = "orange_credits_applications";
    private $orange_credit_micro_loan_request_table =
        "orange_credit_micro_loan_request";
    private $orange_credit_loan_type_table = "orange_credit_loan_type";
    private $system_users_table = "system_users";

    // SELECT ALL
    public function SelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":sponsor_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);

            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->run("SELECT applyTable.*, userTable.`first_name`,  userTable.`middle_name`,  userTable.`last_name`,  loanType.`loan_name` 
                                    FROM  " . $this->
                    orange_credits_applications_table . " AS applyTable
                                    INNER JOIN " . $this->
                    orange_credit_micro_loan_request_table . " AS microLoan
                                    INNER JOIN " . $this->
                    orange_credit_loan_type_table . " AS loanType
                                    INNER JOIN " . $this->system_users_table .
                    " AS userTable                                    
                                    ON applyTable.request_type = loanType.id
                                    AND applyTable.sponsor_id = userTable.userid
                                    WHERE applyTable.sponsor_id =:sponsor_id  
                                    AND DATE(applyTable.createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                    AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->run("SELECT  applyTable.*, userTable.`first_name`,  userTable.`middle_name`, userTable.`last_name`,  loanType.`loan_name` 
                                        FROM " . $this->
                    orange_credits_applications_table . " AS applyTable
                                  INNER JOIN " . $this->
                    orange_credit_micro_loan_request_table . " AS microLoan  
                                  INNER JOIN " . $this->
                    orange_credit_loan_type_table . " AS loanType  
                                  INNER JOIN " . $this->system_users_table .
                    " AS userTable 
                                  ON applyTable.request_type = loanType.id 
                                  AND applyTable.sponsor_id = userTable.userid 
                                  WHERE applyTable.sponsor_id =:sponsor_id 
                                  AND DATE(applyTable.createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') 
                                  AND DATE_FORMAT(:range_limit, '%Y/%m/%d')", $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->run("SELECT applyTable.*, userTable.`first_name`,  userTable.`middle_name`,  userTable.`last_name`,  loanType.`loan_name` 
                                FROM " . $this->
                    orange_credits_applications_table . " AS applyTable
                                  INNER JOIN " . $this->
                    orange_credit_micro_loan_request_table . " AS microLoan
                                  INNER JOIN " . $this->
                    orange_credit_loan_type_table . " AS loanType
                                  INNER JOIN " . $this->system_users_table .
                    " AS userTable                                  
                                    ON applyTable.request_type = loanType.id
                                    AND applyTable.sponsor_id = userTable.userid LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->run("SELECT  applyTable.*,userTable.`first_name`,userTable.`middle_name`,userTable.`last_name`, loanType.`loan_name` 
                                FROM " . $this->
                    orange_credits_applications_table . " AS applyTable
                                  INNER JOIN " . $this->
                    orange_credit_micro_loan_request_table . " AS microLoan
                                  INNER JOIN " . $this->
                    orange_credit_loan_type_table . " AS loanType
                                  INNER JOIN " . $this->system_users_table .
                    " AS userTable                                    
                                    ON applyTable.request_type = loanType.id
                                   AND applyTable.sponsor_id = userTable.userid ORDER BY applyTable.id DESC");
            }
        }
    }

    //Select Count for Pagination
    public function CountRow($query)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":sponsor_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);
            return HDB::hus()->Hcount($this->orange_credits_applications_table,
                "sponsor_id=:sponsor_id  AND DATE(createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);

        } else {
            return HDB::hus()->Hcount($this->orange_credits_applications_table);
        }
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        $sqlQuery = "SELECT  applyTable.*, userTable.`first_name`, userTable.`phone`,  userTable.`middle_name`,userTable.`last_name`,  loanType.`loan_name` 
                    FROM " . $this->orange_credits_applications_table .
            " AS applyTable
                       INNER JOIN " . $this->
            orange_credit_micro_loan_request_table . " AS microLoan
                       INNER JOIN " . $this->orange_credit_loan_type_table .
            " AS loanType
                       INNER JOIN " . $this->system_users_table .
            " AS userTable                      
                        ON applyTable.request_type = loanType.id
                        AND applyTable.sponsor_id = userTable.userid
                        AND applyTable.id=:id";
        return HDB::hus()->runone($sqlQuery, $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credits_applications", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credits_applications");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credits_applications", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($activation_code, $request_beneficary, $request_type, $sponsor_id,
        $amount_requested, $amount_approved, $activation_charge, $monthly_repayment, $total_repayment,
        $total_interest, $application_status, $createdAt, $charge_account_every, $monthly_repayment_starts,
        $monthly_repayment_ends, $comments, $approved_by, $approvedAt, $has_standing_order,
        $standing_order_id)
    {

        $values = array(array(
                'activation_code' => $activation_code,
                'request_beneficary' => $request_beneficary,
                'request_type' => $request_type,
                'sponsor_id' => $sponsor_id,
                'amount_requested' => $amount_requested,
                'amount_approved' => $amount_approved,
                'activation_charge' => $activation_charge,
                'monthly_repayment' => $monthly_repayment,
                'total_repayment' => $total_repayment,
                'total_interest' => $total_interest,
                'application_status' => $application_status,
                'createdAt' => $createdAt,
                'charge_account_every' => $charge_account_every,
                'monthly_repayment_starts' => $monthly_repayment_starts,
                'monthly_repayment_ends' => $monthly_repayment_ends,
                'comments' => $comments,
                'approved_by' => $approved_by,
                'approvedAt' => $approvedAt,
                'has_standing_order' => $has_standing_order,
                'standing_order_id' => $standing_order_id));
        HDB::hus()->Hinsert('orange_credits_applications', $values);
    }

    // UPDATE
    public function Update($activation_code, $request_beneficary, $request_type, $sponsor_id,
        $amount_requested, $amount_approved, $activation_charge, $monthly_repayment, $total_repayment,
        $total_interest, $application_status, $createdAt, $charge_account_every, $monthly_repayment_starts,
        $monthly_repayment_ends, $comments, $approved_by, $approvedAt, $has_standing_order,
        $standing_order_id, $id)
    {
        $sql = "  activation_code =:activation_code,request_beneficary =:request_beneficary,request_type =:request_type,sponsor_id =:sponsor_id,amount_requested =:amount_requested,amount_approved =:amount_approved,activation_charge =:activation_charge,monthly_repayment =:monthly_repayment,total_repayment =:total_repayment,total_interest =:total_interest,application_status =:application_status,createdAt =:createdAt,charge_account_every =:charge_account_every,monthly_repayment_starts =:monthly_repayment_starts,monthly_repayment_ends =:monthly_repayment_ends,comments =:comments,approved_by =:approved_by,approvedAt =:approvedAt,has_standing_order =:has_standing_order,standing_order_id =:standing_order_id WHERE id = :id ";
        $data = array(
            ':activation_code' => $activation_code,
            ':request_beneficary' => $request_beneficary,
            ':request_type' => $request_type,
            ':sponsor_id' => $sponsor_id,
            ':amount_requested' => $amount_requested,
            ':amount_approved' => $amount_approved,
            ':activation_charge' => $activation_charge,
            ':monthly_repayment' => $monthly_repayment,
            ':total_repayment' => $total_repayment,
            ':total_interest' => $total_interest,
            ':application_status' => $application_status,
            ':createdAt' => $createdAt,
            ':charge_account_every' => $charge_account_every,
            ':monthly_repayment_starts' => $monthly_repayment_starts,
            ':monthly_repayment_ends' => $monthly_repayment_ends,
            ':comments' => $comments,
            ':approved_by' => $approved_by,
            ':approvedAt' => $approvedAt,
            ':has_standing_order' => $has_standing_order,
            ':standing_order_id' => $standing_order_id,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credits_applications', $sql, $data);

    }


} // end class


?>
	
	