
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credits_logs_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credits_logs
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credits_logs.php');

class orange_credits_logs_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credits_logs LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credits_logs");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credits_logs");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credits_logs", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credits_logs", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credits_logs");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credits_logs", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($action, $ip_address, $created_by, $createdAt)
    {

        $values = array(array(
                'action' => $action,
                'ip_address' => $ip_address,
                'created_by' => $created_by,
                'createdAt' => $createdAt));
        HDB::hus()->Hinsert('orange_credits_logs', $values);
    }

    // UPDATE
    public function Update($action, $ip_address, $created_by, $createdAt, $id)
    {
        $sql = "  action =:action,ip_address =:ip_address,created_by =:created_by,createdAt =:createdAt WHERE id = :id ";
        $data = array(
            ':action' => $action,
            ':ip_address' => $ip_address,
            ':created_by' => $created_by,
            ':createdAt' => $createdAt,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credits_logs', $sql, $data);

    }


} // end class


?>
	
	