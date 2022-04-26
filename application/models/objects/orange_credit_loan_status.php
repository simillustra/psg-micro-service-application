
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_loan_status_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_status
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_loan_status.php');

class orange_credit_loan_status_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_loan_status LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_loan_status");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_loan_status");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_loan_status", "loanstatus_id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_loan_status", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_loan_status");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_loan_status", "loanstatus_id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($loanstatus_status, $loanstatus_short)
    {

        $values = array(array('loanstatus_status' => $loanstatus_status,
                    'loanstatus_short' => $loanstatus_short));
        HDB::hus()->Hinsert('orange_credit_loan_status', $values);
    }

    // UPDATE
    public function Update($loanstatus_status, $loanstatus_short, $id)
    {
        $sql = "  loanstatus_status =:loanstatus_status,loanstatus_short =:loanstatus_short WHERE loanstatus_id = :id ";
        $data = array(
            ':loanstatus_status' => $loanstatus_status,
            ':loanstatus_short' => $loanstatus_short,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_loan_status', $sql, $data);

    }


} // end class


?>
	
	