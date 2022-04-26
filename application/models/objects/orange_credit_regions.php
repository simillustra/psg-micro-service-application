
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_regions_model
* DATE CREATED:  	14-04-2020
* FOR TABLE:  		orange_credit_regions
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_regions.php');

class orange_credit_regions_model
{
    private $orange_credit_regions_table = "orange_credit_regions";
    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect($this->orange_credit_regions_table ." LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect($this->orange_credit_regions_table);
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount($this->orange_credit_regions_table);
    }
    
     // SELECT ALL
    public function customSelectAll($country_id)
    {

        return HDB::hus()->Hselect($this->orange_credit_regions_table .
            " WHERE country_id = {$country_id}");

    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_regions_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_regions_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        $sql = HDB::hus()->prepare("TRUNCATE orange_credit_regions");
        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete($this->orange_credit_regions_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($name, $country_id)
    {

        $values = array(array('name' => $name, 'country_id' => $country_id));
        HDB::hus()->Hinsert($this->orange_credit_regions_table, $values);
    }

    // UPDATE
    public function Update($name, $country_id, $id)
    {
        $sql = "  name =:name,country_id =:country_id WHERE id = :id ";
        $data = array(
            ':name' => $name,
            ':country_id' => $country_id,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_regions_table, $sql, $data);

    }


} // end class


?>
	
	