<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_payment_history_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_payment_history
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_payment_history.php');

class orange_credit_payment_history_model
{

    private $orange_credit_payment_history_table = "orange_credit_payment_history";

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
                return HDB::hus()->Hselect($this->orange_credit_payment_history_table,
                    " `userid`=:user_id AND DATE(charged_day) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_payment_history_table,
                    " `userid`=:user_id  AND DATE(charged_day) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_payment_history_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_payment_history_table);
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
            return HDB::hus()->Hcount($this->orange_credit_payment_history_table,
                "userid=:user_id  AND DATE(charged_day) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_payment_history_table);
        }
    }


    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_payment_history_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_payment_history_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //        $sql = HDB::hus()->prepare("TRUNCATE ".$this->orange_credit_payment_history_table);
        //        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credit_payment_history_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($userid, $account_id, $payment_method, $loan_id, $amount,
        $status, $transaction_id, $ref_id, $charged_day)
    {

        $values = array(array(
                'userid' => $userid,
                'account_id' => $account_id,
                'payment_method' => $payment_method,
                'loan_id' => $loan_id,
                'amount' => $amount,
                'status' => $status,
                'transaction_id' => $transaction_id,
                'ref_id' => $ref_id,
                'charged_day' => $charged_day));
        HDB::hus()->Hinsert($this->orange_credit_payment_history_table, $values);
    }

    // UPDATE
    public function Update($userid, $account_id, $payment_method, $loan_id, $amount,
        $status, $transaction_id, $ref_id, $charged_day, $id)
    {
        $sql = "  userid =:userid,account_id =:account_id,payment_method =:payment_method,loan_id =:loan_id,amount =:amount,status =:status,transaction_id =:transaction_id,ref_id =:ref_id,charged_day =:charged_day WHERE id = :id ";
        $data = array(
            ':userid' => $userid,
            ':account_id' => $account_id,
            ':payment_method' => $payment_method,
            ':loan_id' => $loan_id,
            ':amount' => $amount,
            ':status' => $status,
            ':transaction_id' => $transaction_id,
            ':ref_id' => $ref_id,
            ':charged_day' => $charged_day,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_payment_history_table, $sql, $data);

    }


} // end class


?>
	
	