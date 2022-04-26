<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_standing_orders_model
* DATE CREATED:  	18-12-2020
* FOR TABLE:  		orange_credit_standing_orders
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/classes/class_orange_credit_standing_orders.php');

class orange_credit_standing_orders_model
{
    public $orange_credit_standing_orders = "orange_credit_standing_orders";
    public $orange_credits_accounts = "orange_credits_accounts";
    public $orange_credit_transactions = "orange_credit_transactions";

    // SELECT ALL
    public function SelectAll($limit = NULL)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_standing_orders LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_standing_orders");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_standing_orders");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_standing_orders", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_standing_orders", "$where LIKE :svalue LIMIT $limit", $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        $sql = HDB::hus()->prepare("TRUNCATE orange_credit_standing_orders");
        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete("orange_credit_standing_orders", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($payee_id, $payee_name, $payee_account_number, $total_amount, $deductable_amount, $recieving_account, $number_of_payment, $order_status, $payment_frequency, $starting_date, $next_payment_date, $ending_date, $authorizedBy, $reference, $createdAt)
    {

        $values = array(array('payee_id' => $payee_id, 'payee_name' => $payee_name, 'payee_account_number' => $payee_account_number, 'total_amount' => $total_amount, 'deductable_amount' => $deductable_amount, 'recieving_account' => $recieving_account, 'number_of_payment' => $number_of_payment, 'order_status' => $order_status, 'payment_frequency' => $payment_frequency, 'starting_date' => $starting_date, 'next_payment_date' => $next_payment_date, 'ending_date' => $ending_date, 'authorizedBy' => $authorizedBy, 'reference' => $reference, 'createdAt' => $createdAt));
        HDB::hus()->Hinsert('orange_credit_standing_orders', $values);

    }

    // UPDATE
    public function Update($payee_id, $payee_name, $payee_account_number, $total_amount, $deductable_amount, $recieving_account, $number_of_payment, $order_status, $payment_frequency, $starting_date, $next_payment_date, $ending_date, $authorizedBy, $reference, $createdAt, $id)
    {
        $sql = "  payee_id =:payee_id,payee_name =:payee_name,payee_account_number =:payee_account_number,total_amount =:total_amount,deductable_amount =:deductable_amount,recieving_account =:recieving_account,number_of_payment =:number_of_payment,order_status =:order_status,payment_frequency =:payment_frequency,starting_date =:starting_date,next_payment_date =:next_payment_date,ending_date =:ending_date,authorizedBy =:authorizedBy,reference =:reference,createdAt =:createdAt WHERE id = :id ";
        $data = array(':payee_id' => $payee_id, ':payee_name' => $payee_name, ':payee_account_number' => $payee_account_number, ':total_amount' => $total_amount, ':deductable_amount' => $deductable_amount, ':recieving_account' => $recieving_account, ':number_of_payment' => $number_of_payment, ':order_status' => $order_status, ':payment_frequency' => $payment_frequency, ':starting_date' => $starting_date, ':next_payment_date' => $next_payment_date, ':ending_date' => $ending_date, ':authorizedBy' => $authorizedBy, ':reference' => $reference, ':createdAt' => $createdAt, ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_standing_orders', $sql, $data);

    }

    public function lastInsertID()
    {
        return HDB::hus()->get_last_insert_id();

    }

    public function deduct_down_payment($sender_id, $send_account, $receive_account, $amount)
    {
        try {
            HDB::hus()->beginTransaction();
            // check if account has funds
            $bind = array(":acct_number" => $send_account,
                ":amount" => $amount);
            $query = HDB::hus()->Hone($this->orange_credits_accounts, "acct_number=:acct_number AND account_balance >=:amount", $bind);

            if ($query) {
                // deduct customer amount from account
                $sql = "  account_balance =(account_balance - :amount) WHERE acct_number = :acct_number ";
                HDB::hus()->Hupdate($this->orange_credits_accounts, $sql, $bind);

                //update Admin amount from funds
                $sql2 = " account_balance = (account_balance + :amount) WHERE acct_number =:acct_number ";
                $data = array(':amount' => $amount, ':acct_number' => $receive_account);
                HDB::hus()->Hupdate($this->orange_credits_accounts, $sql2, $data);


                $values = array(array(
                    'transactionid' => mt_rand(1000000000, 9999999999),
                    'sender_id' => $sender_id,
                    'sender_account' => $send_account,
                    'receiver_id' => 1,
                    'receiver_account' => $receive_account,
                    'payment_method' => 'WALLET TRANSFER PAYMENT',
                    'amount' => $amount,
                    'payment_status' => 'APPROVED',
                    'transaction_type' => 'CREDIT',
                    'payment_date' => date('Y-m-d H:i:s')));
                HDB::hus()->Hinsert($this->orange_credit_transactions, $values);

                HDB::hus()->commit();

                return true;
            } else {
                HDB::hus()->rollBack();
                return false;
            }


        } catch (Exception $e) {
            HDB::hus()->rollBack();
            return false;
        }
    }


} // end class

?>
	
	