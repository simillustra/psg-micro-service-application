
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_branches_model
* DATE CREATED:  	15-04-2020
* FOR TABLE:  		orange_credit_branches
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			Simillustra (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER . '/models/classes/class_orange_credit_branches.php');

class orange_credit_branches_model
{

    private $orange_credit_branches_table = "orange_credit_branches";
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
                return HDB::hus()->Hselect($this->orange_credit_branches_table,
                    " `contact_person`=:user_id AND DATE(zone_createdAt) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_branches_table,
                    " `contact_person`=:user_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_branches_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_branches_table);
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
            return HDB::hus()->Hcount($this->orange_credit_branches_table,
                "contact_person=:user_id  AND DATE(date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_branches_table);
        }
    }
    
     // Get List
    public function showList($contact_person)
    {
        $bind = array(":contact_person" => $contact_person);
        return HDB::hus()->Hselect($this->orange_credit_branches_table,
            "`contact_person`=:contact_person OR `parent_id`=:contact_person", $bind);
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_branches_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_branches_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$sql = HDB::hus()->prepare("TRUNCATE orange_credit_branches");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
       //// $bind = array(":id" => $id);
        //HDB::hus()->Hdelete($this->orange_credit_branches_table, "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($branch_code, $branch_name, $branch_address, $branch_city,
        $branch_state, $branch_country, $parent_id, $zone_coverage, $contact_person, $date_created)
    {

        $values = array(array(
                'branch_code' => $branch_code,
                'branch_name' => $branch_name,
                'branch_address' => $branch_address,
                'branch_city' => $branch_city,
                'branch_state' => $branch_state,
                'branch_country' => $branch_country,
                'parent_id' => $parent_id,
                'zone_coverage' => $zone_coverage,
                'contact_person' => $contact_person,
                'date_created' => $date_created));
        HDB::hus()->Hinsert('orange_credit_branches', $values);
    }

    // UPDATE
    public function Update($branch_code, $branch_name, $branch_address, $branch_city,
        $branch_state, $branch_country, $parent_id, $zone_coverage, $contact_person, $date_created,
        $id)
    {
        $sql = "  branch_code =:branch_code,branch_name =:branch_name,branch_address =:branch_address,branch_city =:branch_city,branch_state =:branch_state,branch_country =:branch_country,parent_id =:parent_id,zone_coverage =:zone_coverage,contact_person =:contact_person,date_created =:date_created WHERE id = :id ";
        $data = array(
            ':branch_code' => $branch_code,
            ':branch_name' => $branch_name,
            ':branch_address' => $branch_address,
            ':branch_city' => $branch_city,
            ':branch_state' => $branch_state,
            ':branch_country' => $branch_country,
            ':parent_id' => $parent_id,
            ':zone_coverage' => $zone_coverage,
            ':contact_person' => $contact_person,
            ':date_created' => $date_created,
            ':id' => $id);
        HDB::hus()->Hupdate('orange_credit_branches', $sql, $data);

    }


} // end class


?>
	
	