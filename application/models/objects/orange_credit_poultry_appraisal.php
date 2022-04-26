<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_poultry_appraisal_model
* DATE CREATED:  	26-04-2022
* FOR TABLE:  		orange_credit_poultry_appraisal
* PRODUCED BY:		HEZECOM UltimateSpeed PHP CODE GENERATOR
* AUTHOR:			Hezecom (http://hezecom.com) info@hezecom.net
* =======================================================================
*/
if (!defined('VALID_DIR')) die('You are not allowed to execute this file directly');

include_once(APP_FOLDER . '/models/classes/class_orange_credit_poultry_appraisal.php');

class orange_credit_poultry_appraisal_model
{
    private $orange_credit_poultry_appraisal_table = "orange_credit_poultry_appraisal";

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
                return HDB::hus()->Hselect($this->orange_credit_poultry_appraisal_table,
                    " `user_id`=:user_id AND DATE(poultry_farm_date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_poultry_appraisal_table,
                    " `user_id`=:user_id  AND DATE(poultry_farm_date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_poultry_appraisal_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_poultry_appraisal_table);
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
            return HDB::hus()->Hcount($this->orange_credit_poultry_appraisal_table,
                "user_id=:user_id  AND DATE(poultry_farm_date_created) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_poultry_appraisal_table);
        }
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_poultry_appraisal_table, "id=:id", $bind);
    }

    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        //$db = DB::getInstance();
        //$sql = $db->prepare("TRUNCATE orange_credit_poultry_appraisal");
        //$sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$dbc = new dboptions();
        //$dbc->dbDelete('orange_credit_poultry_appraisal', 'id', $id);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($poultry_farm_name, $poultry_farm_address, $poultry_farm_management_style, $poultry_farm_produce_type, $poultry_farm_total, $poultry_farm_revenue_cycle, $poultry_farm_revenue, $poultry_farm_profit_margin, $poultry_farm_date_created, $poultry_farm_date_mordified, $user_id)
    {
        $values = array(array('poultry_farm_name' => $poultry_farm_name, 'poultry_farm_address' => $poultry_farm_address, 'poultry_farm_management_style' => $poultry_farm_management_style, 'poultry_farm_produce_type' => $poultry_farm_produce_type, 'poultry_farm_total' => $poultry_farm_total, 'poultry_farm_revenue_cycle' => $poultry_farm_revenue_cycle, 'poultry_farm_revenue' => $poultry_farm_revenue, 'poultry_farm_profit_margin' => $poultry_farm_profit_margin, 'poultry_farm_date_created' => $poultry_farm_date_created, 'poultry_farm_date_mordified' => $poultry_farm_date_mordified, 'user_id' => $user_id));
        HDB::hus()->Hinsert($this->orange_credit_poultry_appraisal_table, $values);
    }

    // UPDATE
    public function Update($poultry_farm_name, $poultry_farm_address, $poultry_farm_management_style, $poultry_farm_produce_type, $poultry_farm_total, $poultry_farm_revenue_cycle, $poultry_farm_revenue, $poultry_farm_profit_margin, $poultry_farm_date_created, $poultry_farm_date_mordified, $user_id, $id)
    {
        $sql = " UPDATE orange_credit_poultry_appraisal SET  poultry_farm_name =:poultry_farm_name,poultry_farm_address =:poultry_farm_address,poultry_farm_management_style =:poultry_farm_management_style,poultry_farm_produce_type =:poultry_farm_produce_type,poultry_farm_total =:poultry_farm_total,poultry_farm_revenue_cycle =:poultry_farm_revenue_cycle,poultry_farm_revenue =:poultry_farm_revenue,poultry_farm_profit_margin =:poultry_farm_profit_margin,poultry_farm_date_created =:poultry_farm_date_created,poultry_farm_date_mordified =:poultry_farm_date_mordified,user_id =:user_id WHERE id = :id ";
        $data = array(':poultry_farm_name' => $poultry_farm_name, ':poultry_farm_address' => $poultry_farm_address, ':poultry_farm_management_style' => $poultry_farm_management_style, ':poultry_farm_produce_type' => $poultry_farm_produce_type, ':poultry_farm_total' => $poultry_farm_total, ':poultry_farm_revenue_cycle' => $poultry_farm_revenue_cycle, ':poultry_farm_revenue' => $poultry_farm_revenue, ':poultry_farm_profit_margin' => $poultry_farm_profit_margin, ':poultry_farm_date_created' => $poultry_farm_date_created, ':poultry_farm_date_mordified' => $poultry_farm_date_mordified, ':user_id' => $user_id, ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_poultry_appraisal_table, $sql, $data);

    }


} // end class

?>
	
	