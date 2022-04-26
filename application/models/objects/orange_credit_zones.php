
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_zones_model
* DATE CREATED:  	14-04-2020
* FOR TABLE:  		orange_credit_zones
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			SIMILLUSTRA  (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_zones.php');

class orange_credit_zones_model
{
    private $orange_credit_zones_table = "orange_credit_zones";
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
                return HDB::hus()->Hselect($this->orange_credit_zones_table,
                    " `zone_user`=:user_id AND DATE(zone_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_zones_table,
                    " `zone_user`=:user_id  AND DATE(zone_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_zones_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_zones_table);
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
            return HDB::hus()->Hcount($this->orange_credit_zones_table,
                "zone_user=:user_id  AND DATE(zone_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_zones_table);
        }
    }

    // Get List
    public function showList($zone_user)
    {
        $bind = array(":zone_user" => $zone_user);
        return HDB::hus()->Hselect($this->orange_credit_zones_table,
            "`zone_user`=:zone_user AND `zone_status`='ACTIVE'", $bind);
    }


    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_zones_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_zones_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        $sql = HDB::hus()->prepare("TRUNCATE " . $this->orange_credit_zones_table);
        $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        $bind = array(":id" => $id);
        HDB::hus()->Hdelete($this->orange_credit_zones_table, "id=:id", $bind);
        send_to($redirect_to);
    }


    // INSERT
    public function Insert($zone_name, $zone_coverage, $zone_status, $zone_city, $zone_state,
        $zone_country, $zone_createdAt, $zone_modifiedAt, $zone_user)
    {

        $values = array(array(
                'zone_name' => $zone_name,
                'zone_coverage' => $zone_coverage,
                'zone_status' => $zone_status,
                'zone_city' => $zone_city,
                'zone_state' => $zone_state,
                'zone_country' => $zone_country,
                'zone_createdAt' => $zone_createdAt,
                'zone_modifiedAt' => $zone_modifiedAt,
                'zone_user' => $zone_user));
        HDB::hus()->Hinsert($this->orange_credit_zones_table, $values);
    }

    // UPDATE
    public function Update($zone_name, $zone_coverage, $zone_status, $zone_city, $zone_state,
        $zone_country, $zone_createdAt, $zone_modifiedAt, $zone_user, $id)
    {
        $sql = "  zone_name =:zone_name,zone_coverage =:zone_coverage,zone_status =:zone_status,zone_city =:zone_city,zone_state =:zone_state,zone_country =:zone_country,zone_createdAt =:zone_createdAt,zone_modifiedAt =:zone_modifiedAt,zone_user =:zone_user WHERE id = :id ";
        $data = array(
            ':zone_name' => $zone_name,
            ':zone_coverage' => $zone_coverage,
            ':zone_status' => $zone_status,
            ':zone_city' => $zone_city,
            ':zone_state' => $zone_state,
            ':zone_country' => $zone_country,
            ':zone_createdAt' => $zone_createdAt,
            ':zone_modifiedAt' => $zone_modifiedAt,
            ':zone_user' => $zone_user,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_zones_table, $sql, $data);

    }

} // end class



?>
	
	