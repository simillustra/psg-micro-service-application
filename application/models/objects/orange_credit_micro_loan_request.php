<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_micro_loan_request_model
* DATE CREATED:  	07-03-2020
* FOR TABLE:  		orange_credit_micro_loan_request
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_micro_loan_request.php');

class orange_credit_micro_loan_request_model
{

    // SELECT ALL
    // SELECT ALL
    private $orange_credit_micro_loan_request_table =
        "orange_credit_micro_loan_request";

    // SELECT ALL
    public function SelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);

            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_micro_loan_request_table,
                    " `userid`=:user_id AND DATE(request_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_micro_loan_request_table,
                    " `userid`=:user_id  AND DATE(request_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_micro_loan_request_table .
                    " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_micro_loan_request_table);
            }
        }

    }

    //Select Count for Pagination
    public function CountRow($query)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":user_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);
            return HDB::hus()->Hcount($this->orange_credit_micro_loan_request_table,
                "userid=:user_id  AND DATE(request_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_micro_loan_request_table);
        }
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_micro_loan_request_table, "id=:id",
            $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_micro_loan_request_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE " . $this->
          //  orange_credit_micro_loan_request_table);
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credit_micro_loan_request_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($loan_type, $business_type, $monthly_revenue, $loan_request_amount,
        $loan_repayment_amount, $loan_tenure, $loan_interest, $activation_fee, $loan_request_deposit,
        $request_date, $loan_status, $userid)
    {

        $values = array(array(
                'loan_type' => $loan_type,
                'business_type' => $business_type,
                'monthly_revenue' => $monthly_revenue,
                'loan_request_amount' => $loan_request_amount,
                'loan_repayment_amount' => $loan_repayment_amount,
                'loan_tenure' => $loan_tenure,
                'loan_interest' => $loan_interest,
                'activation_fee' => $activation_fee,
                'loan_request_deposit' => $loan_request_deposit,
                'request_date' => $request_date,
                'loan_status' => $loan_status,
                'userid' => $userid));
        HDB::hus()->Hinsert($this->orange_credit_micro_loan_request_table, $values);
    }

    // UPDATE
    public function Update($loan_type, $business_type, $monthly_revenue, $loan_request_amount,
        $loan_repayment_amount, $loan_tenure, $loan_interest, $activation_fee, $loan_request_deposit,
        $request_date, $loan_status, $userid, $id)
    {
        $sql = "  loan_type =:loan_type,business_type =:business_type,monthly_revenue =:monthly_revenue,loan_request_amount =:loan_request_amount,loan_repayment_amount =:loan_repayment_amount,loan_tenure =:loan_tenure,loan_interest =:loan_interest,activation_fee =:activation_fee, loan_request_deposit:loan_request_deposit, request_date =:request_date,loan_status =:loan_status,userid =:userid WHERE id = :id ";
        $data = array(
            ':loan_type' => $loan_type,
            ':business_type' => $business_type,
            ':monthly_revenue' => $monthly_revenue,
            ':loan_request_amount' => $loan_request_amount,
            ':loan_repayment_amount' => $loan_repayment_amount,
            ':loan_tenure' => $loan_tenure,
            ':loan_interest' => $loan_interest,
            ':activation_fee' => $activation_fee,
            ':loan_request_deposit' => $loan_request_deposit,
            ':request_date' => $request_date,
            ':loan_status' => $loan_status,
            ':userid' => $userid,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_micro_loan_request_table, $sql, $data);

    }


} // end class



?>
	
	