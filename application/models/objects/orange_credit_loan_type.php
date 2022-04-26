
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_loan_type_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_loan_type
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_loan_type.php');

class orange_credit_loan_type_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_loan_type LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_loan_type");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_loan_type");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_loan_type", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_loan_type", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_loan_type");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
       // $bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_loan_type", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($loan_name, $prefix, $maximum_amount, $minimum_amount, $loan_tenure,
        $activation_charge, $interest, $status, $createdAt, $modifiedAt, $user_id)
    {

        $values = array(array(
                'loan_name' => $loan_name,
                'prefix' => $prefix,
                'maximum_amount' => $maximum_amount,
                'minimum_amount' => $minimum_amount,
                'loan_tenure' => $loan_tenure,
                'activation_charge' => $activation_charge,
                'interest' => $interest,
                'status' => $status,
                'createdAt' => $createdAt,
                'modifiedAt' => $modifiedAt,
                'user_id' => $user_id));
        HDB::hus()->Hinsert('orange_credit_loan_type', $values);
    }

    // UPDATE
    public function Update($loan_name, $prefix, $maximum_amount, $minimum_amount, $loan_tenure,
        $activation_charge, $interest, $status, $createdAt, $modifiedAt, $user_id, $id)
    {
        $sql = "  loan_name =:loan_name,prefix =:prefix,maximum_amount =:maximum_amount,minimum_amount =:minimum_amount,loan_tenure =:loan_tenure,activation_charge =:activation_charge,interest =:interest,status =:status,createdAt =:createdAt,modifiedAt =:modifiedAt,user_id =:user_id WHERE id = :id ";
        $data = array(
            ':loan_name' => $loan_name,
            ':prefix' => $prefix,
            ':maximum_amount' => $maximum_amount,
            ':minimum_amount' => $minimum_amount,
            ':loan_tenure' => $loan_tenure,
            ':activation_charge' => $activation_charge,
            ':interest' => $interest,
            ':status' => $status,
            ':createdAt' => $createdAt,
            ':modifiedAt' => $modifiedAt,
            ':user_id' => $user_id,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_loan_type', $sql, $data);

    }


} // end class


?>
	
	