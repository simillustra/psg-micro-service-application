
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_loan_payment_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_payment
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_loan_payment.php');

class orange_credit_loan_payment_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_loan_payment LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_loan_payment");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_loan_payment");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_loan_payment", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_loan_payment", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_loan_payment");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_loan_payment", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($payment_date, $paid_amount, $principle_amount, $interest_amount,
        $balance, $userid, $loan_id)
    {

        $values = array(array(
                'payment_date' => $payment_date,
                'paid_amount' => $paid_amount,
                'principle_amount' => $principle_amount,
                'interest_amount' => $interest_amount,
                'balance' => $balance,
                'userid' => $userid,
                'loan_id' => $loan_id));
        HDB::hus()->Hinsert('orange_credit_loan_payment', $values);
    }

    // UPDATE
    public function Update($payment_date, $paid_amount, $principle_amount, $interest_amount,
        $balance, $userid, $loan_id, $id)
    {
        $sql = "  payment_date =:payment_date,paid_amount =:paid_amount,principle_amount =:principle_amount,interest_amount =:interest_amount,balance =:balance,userid =:userid,loan_id =:loan_id WHERE id = :id ";
        $data = array(
            ':payment_date' => $payment_date,
            ':paid_amount' => $paid_amount,
            ':principle_amount' => $principle_amount,
            ':interest_amount' => $interest_amount,
            ':balance' => $balance,
            ':userid' => $userid,
            ':loan_id' => $loan_id,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_loan_payment', $sql, $data);

    }


} // end class


?>
	
	