
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_countries_model
* DATE CREATED:  	05-03-2020
* FOR TABLE:  		orange_credit_countries
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_countries.php');

class orange_credit_countries_model
{

    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect("orange_credit_countries LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect("orange_credit_countries");
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount("orange_credit_countries");
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone("orange_credit_countries", "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect("orange_credit_countries", "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
       // $sql = HDB::hus()->prepare("TRUNCATE orange_credit_countries");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_countries", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($name, $code)
    {

        $values = array(array('name' => $name, 'code' => $code));
        HDB::hus()->Hinsert('orange_credit_countries', $values);
    }

    // UPDATE
    public function Update($name, $code, $id)
    {
        $sql = "  name =:name,code =:code WHERE id = :id ";
        $data = array(
            ':name' => $name,
            ':code' => $code,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_countries', $sql, $data);

    }


} // end class


?>
	
	