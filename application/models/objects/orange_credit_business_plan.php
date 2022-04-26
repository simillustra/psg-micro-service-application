
	<?php
/*
* =======================================================================
* CLASSNAME:        orange_credit_business_plan_model
* DATE CREATED:  	01-04-2020
* FOR TABLE:  		orange_credit_business_plan
* PRODUCED BY:		SIMILLUSTRA  PHP CODE GENERATOR
* AUTHOR:			S.A.V.I.O.U.R (http://simillustra.com) info@simillustra.com
* =======================================================================
*/
if (!defined('VALID_DIR'))
    die('You are not allowed to execute this file directly');

include_once (APP_FOLDER .
    '/models/classes/class_orange_credit_business_plan.php');

class orange_credit_business_plan_model
{
    private $orange_credit_business_plan_table = "orange_credit_business_plan";
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
                return HDB::hus()->Hselect($this->orange_credit_business_plan_table,
                    " `business_plan_user`=:user_id AND DATE(business_date_applied) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d') LIMIT {$startpg} , {$limit}",
                    $bind);
            } else {
                return HDB::hus()->Hselect($this->orange_credit_business_plan_table,
                    " `business_plan_user`=:user_id  AND DATE(business_date_applied) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                    $bind);
            }
        } else {
            if ($limit) {
                $startpg = pageparam($limit);
                return HDB::hus()->Hselect($this->orange_credit_business_plan_table . " LIMIT {$startpg} , {$limit}");
            } else {
                return HDB::hus()->Hselect($this->orange_credit_business_plan_table);
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
            return HDB::hus()->Hcount($this->orange_credit_business_plan_table,
                "business_plan_user=:user_id  AND DATE(business_date_applied) BETWEEN DATE_FORMAT(:range_start, '%Y/%m/%d') AND DATE_FORMAT(:range_limit, '%Y/%m/%d')",
                $bind);
        } else {
            return HDB::hus()->Hcount($this->orange_credit_business_plan_table);
        }
    }

    // SELECT ONE
    public function SelectOne($id)
    {
        $bind = array(":id" => $id);
        return HDB::hus()->Hone($this->orange_credit_business_plan_table, "id=:id", $bind);
    }

    // QUICK SEARCH
    public function AutoSearch($qstring, $limit, $where)
    {
        $bind = array(":svalue" => "%$qstring%");
        return HDB::hus()->Hselect($this->orange_credit_business_plan_table, "$where LIKE :svalue LIMIT $limit",
            $bind);
    }

    // Get List
    public function showList($userid)
    {
        $bind = array(":business_plan_user" => $userid);
        return HDB::hus()->Hselect($this->orange_credit_business_plan_table,
            "`business_plan_user`=:business_plan_user AND `business_plan_status`='APPROVED'", $bind);
    }


    // TRUNCATE TABLE
    public function TruncateTable($redirect_to)
    {
        // $sql = HDB::hus()->prepare("TRUNCATE orange_credit_business_plan");
        //  $sql->execute();
        send_to($redirect_to);
    }

    // DELETE
    public function Delete($id, $redirect_to)
    {
        //$bind = array(":id" => $id);
        //HDB::hus()->Hdelete("orange_credit_business_plan", "id=:id", $bind);
        send_to($redirect_to);
    }

    // INSERT
    public function Insert($business_plan_title, $business_name, $business_address,
        $business_manager, $business_type, $business_market_demand, $business_sales_frequency,
        $business_monthly_revenue, $business_investment, $business_investment_duration,
        $business_estimated_profit_margin, $business_expected_monthly_sales, $business_coupon_code,
        $business_plan_status, $business_date_applied, $business_date_approved, $business_plan_user)
    {

        $values = array(array(
                'business_plan_title' => $business_plan_title,
                'business_name' => $business_name,
                'business_address' => $business_address,
                'business_manager' => $business_manager,
                'business_type' => $business_type,
                'business_market_demand' => $business_market_demand,
                'business_sales_frequency' => $business_sales_frequency,
                'business_monthly_revenue' => $business_monthly_revenue,
                'business_investment' => $business_investment,
                'business_investment_duration' => $business_investment_duration,
                'business_estimated_profit_margin' => $business_estimated_profit_margin,
                'business_expected_monthly_sales' => $business_expected_monthly_sales,
                'business_coupon_code' => $business_coupon_code,
                'business_plan_status' => $business_plan_status,
                'business_date_applied' => $business_date_applied,
                'business_date_approved' => $business_date_approved,
                'business_plan_user' => $business_plan_user));
        HDB::hus()->Hinsert($this->orange_credit_business_plan_table, $values);
    }

    // UPDATE
    public function Update($business_plan_title, $business_name, $business_address,
        $business_manager, $business_type, $business_market_demand, $business_sales_frequency,
        $business_monthly_revenue, $business_investment, $business_investment_duration,
        $business_estimated_profit_margin, $business_expected_monthly_sales, $business_coupon_code,
        $business_plan_status, $business_date_applied, $business_date_approved, $business_plan_user,
        $id)
    {
        $sql = "business_plan_title:business_plan_title, business_name =:business_name,business_address =:business_address,business_manager =:business_manager,business_type =:business_type,business_market_demand =:business_market_demand,business_sales_frequency =:business_sales_frequency,business_monthly_revenue =:business_monthly_revenue,business_investment =:business_investment,business_investment_duration =:business_investment_duration,business_estimated_profit_margin =:business_estimated_profit_margin,business_expected_monthly_sales =:business_expected_monthly_sales,business_coupon_code =:business_coupon_code,business_plan_status =:business_plan_status,business_date_applied =:business_date_applied,business_date_approved =:business_date_approved,business_plan_user =:business_plan_user WHERE id = :id ";
        $data = array(
            ':business_plan_title' => $business_plan_title,
            ':business_name' => $business_name,
            ':business_address' => $business_address,
            ':business_manager' => $business_manager,
            ':business_type' => $business_type,
            ':business_market_demand' => $business_market_demand,
            ':business_sales_frequency' => $business_sales_frequency,
            ':business_monthly_revenue' => $business_monthly_revenue,
            ':business_investment' => $business_investment,
            ':business_investment_duration' => $business_investment_duration,
            ':business_estimated_profit_margin' => $business_estimated_profit_margin,
            ':business_expected_monthly_sales' => $business_expected_monthly_sales,
            ':business_coupon_code' => $business_coupon_code,
            ':business_plan_status' => $business_plan_status,
            ':business_date_applied' => $business_date_applied,
            ':business_date_approved' => $business_date_approved,
            ':business_plan_user' => $business_plan_user,
            ':id' => $id);
        HDB::hus()->Hupdate($this->orange_credit_business_plan_table, $sql, $data);

    }


} // end class



?>
	
	