
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_payments_model
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_payments
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_payments.php');

class orange_credit_payments_model
{
    private $orange_credit_payments_table = "orange_credit_payments";

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
                return HDB::hus()->Hselect($this->orange_credit_payments_table,
                    " `transaction_user`=:user_id AND DATE(transaction_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_payments_table,
                    " `transaction_user`=:user_id  AND DATE(transaction_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_payments_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_payments_table);
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
            return HDB::hus()->Hcount($this->orange_credit_payments_table,
                "transaction_user=:user_id  AND DATE(transaction_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_payments_table);
        }
    }


    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_payments_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_payments_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_payments");
        // $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        // HDB::hus()->Hdelete("orange_credit_payments", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($transaction_id, $transaction_amount, $transaction_desc,
        $transaction_provider, $transaction_status, $transaction_date, $transaction_user)
    {

        $values = array(array(
                'transaction_id' => $transaction_id,
                'transaction_amount' => $transaction_amount,
                'transaction_desc' => $transaction_desc,
                'transaction_provider' => $transaction_provider,
                'transaction_status' => $transaction_status,
                'transaction_date' => $transaction_date,
                'transaction_user' => $transaction_user));
        HDB::hus()->Hinsert($this->orange_credit_payments_table, $values);
    }

    // UPDATE
    public function Update($transaction_id, $transaction_amount, $transaction_desc,
        $transaction_provider, $transaction_status, $transaction_date, $transaction_user,
        $id)
    {
        $sql = "  transaction_id =:transaction_id,transaction_amount =:transaction_amount,transaction_desc =:transaction_desc,transaction_provider =:transaction_provider,transaction_status =:transaction_status,transaction_date =:transaction_date,transaction_user =:transaction_user WHERE id = :id ";
        $data = array(
            ':transaction_id' => $transaction_id,
            ':transaction_amount' => $transaction_amount,
            ':transaction_desc' => $transaction_desc,
            ':transaction_provider' => $transaction_provider,
            ':transaction_status' => $transaction_status,
            ':transaction_date' => $transaction_date,
            ':transaction_user' => $transaction_user,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_payments_table, $sql, $data);

    }


} // end class




?>
	
	