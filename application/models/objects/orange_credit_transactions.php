<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_transactions_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_transactions
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_transactions.php');

class orange_credit_transactions_model
{

    private $orange_credit_transactions = "orange_credit_transactions";

    // SELECT ALL
    public function SelectAll($query, $limit = null)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":sender_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);

            if ($limit) {
                $start_page = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_transactions,
                    " `sender_id`=:sender_id OR `receiver_id`=:sender_id AND DATE(payment_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$start_page} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_transactions,
                    " `sender_id`=:sender_id AND `receiver_id`=:sender_id AND DATE(payment_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $start_page = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_transactions . " LIMIT {$start_page} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_transactions);
            }
        }
    }

    //Select Count for Pagination

    public function CountRow($query)
    {
        if ($query['user_role'] == 5) {
            $bind = array(
                ":sender_id" => $query['user_id'],
                ":range_start" => $query['range_start'],
                ":range_limit" => $query['range_end']);
            return HDB::hus()->Hcount($this->orange_credit_transactions,
                "sender_id=:sender_id OR `receiver_id`=:sender_id AND DATE(payment_date) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_transactions);
        }
    }


    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_transactions, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_transactions, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE " . $this->orange_credit_transactions);
        // $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credit_transactions, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($transactionid, $sender_id, $sender_account, $receiver_id,
        $receiver_account, $payment_method, $amount, $payment_status, $transaction_type,
        $payment_date)
    {

        $values = array(array(
                'transactionid' => $transactionid,
                'sender_id' => $sender_id,
                'sender_account' => $sender_account,
                'receiver_id' => $receiver_id,
                'receiver_account' => $receiver_account,
                'payment_method' => $payment_method,
                'amount' => $amount,
                'payment_status' => $payment_status,
                'transaction_type' => $transaction_type,
                'payment_date' => $payment_date));
        HDB::hus()->Hinsert($this->orange_credit_transactions, $values);
    }

    // UPDATE
    public function Update($transactionid, $sender_id, $sender_account, $receiver_id,
        $receiver_account, $payment_method, $amount, $payment_status, $transaction_type,
        $payment_date, $id)
    {
        $sql = "  transactionid =:transactionid,sender_id =:sender_id,sender_account =:sender_account,receiver_id =:receiver_id,receiver_account =:receiver_account,payment_method =:payment_method,amount =:amount,payment_status =:payment_status,transaction_type =:transaction_type,payment_date =:payment_date WHERE id = :id ";
        $data = array(
            ':transactionid' => $transactionid,
            ':sender_id' => $sender_id,
            ':sender_account' => $sender_account,
            ':receiver_id' => $receiver_id,
            ':receiver_account' => $receiver_account,
            ':payment_method' => $payment_method,
            ':amount' => $amount,
            ':payment_status' => $payment_status,
            ':transaction_type' => $transaction_type,
            ':payment_date' => $payment_date,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_transactions, $sql, $data);

    }


} // end class



?>
	
	