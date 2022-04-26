
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_cities_model
* DATE CREATED:  	14-04-2020
* FOR TABLE:  		orange_credit_cities
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_cities.php');

class orange_credit_cities_model
{
    private $orange_credit_city_table = "orange_credit_city";
    // SELECT ALL
    public function SelectAll($limit = null)
    {
        if ($limit) {
            $startpg = pageparam($limit);
            return HDB::hus()->Hselect($this->orange_credit_city_table . "LIMIT {$startpg} , {$limit}");
        } else {
            return HDB::hus()->Hselect($this->orange_credit_city_table);
        }
    }

    //Select Count for Pagination
    public function CountRow()
    {
        return HDB::hus()->Hcount($this->orange_credit_city_table);
    }

    // SELECT ALL
    public function customSelectAll($region, $country_id)
    {

        return HDB::hus()->Hselect($this->orange_credit_city_table .
            " WHERE region_id = {$region}  AND country_id = {$country_id}");

    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_city_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_city_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
       // $sql = HDB::hus()->prepare("TRUNCATE orange_credit_cities");
       // $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete($this->orange_credit_city_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($region_id, $country_id, $name)
    {

        $values = array(array(
                'region_id' => $region_id,
                'country_id' => $country_id,
                'name' => $name));
        HDB::hus()->Hinsert($this->orange_credit_city_table, $values);
    }

    // UPDATE
    public function Update($region_id, $country_id, $name, $id)
    {
        $sql = "  region_id =:region_id,country_id =:country_id,name =:name WHERE id = :id ";
        $data = array(
            ':region_id' => $region_id,
            ':country_id' => $country_id,
            ':name' => $name,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_city_table, $sql, $data);

    }


} // end class



?>
	
	